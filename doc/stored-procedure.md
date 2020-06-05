# Stored procedure

One stored procedure is vital to the operation of Morfetik: the `createFormes()` procedure. This procedure is responsible for generating the `formes` table, which is used by Morfetik for searching.

## But why?

The DB design has a few oddities that are out of our control now. The biggest one is the creation of a "join table" that joined all the different tables in a single one. This table was then used in [the old interface](https://tal.lipn.univ-paris13.fr/morfetik1/) for queries.

The purpose of this table is multifold:
* join all tables together, categorizing them according  with the `Cat` field.
* join based on the `flex` field for each row. Most importantly, if there are multiple values in the `flex` field, like `01;03`, then *each of the joins must be made.*
* set values based on the type of each row.

The issue is generating this table: the tool used to generate this table is now missing. We now have an SQL implementation of that tool that mimics the most important features, in a stored procedure called `createFormes()`.

Most importantly, because the stored procedures takes a while to run, it will run every day. This means that **changes made in the editing interface of Morfetik won't apply until the start of the next day.** 

## Adding the request to production

The request is added to the migrations; it will get added automatically when you migrate:
```shell
./yii migrate --migrationPath=@yii/rbac/migrations
./yii migrate
```
Also see `extra/install.md` to migrate.

## Editing the request

The migration itself can be found at `migrations/..._formes_stored_procedure.php`. The parts that make up the procedure can be found in `extra/stored-procedure`.

### Design

We run a procedure per table type. If the table is simple enough, then the type is added in the main request.
In `extra/stored-procedure`, you can find the main request at main.sql. It uses procedures defined in:

* `proc-adj.sql`
* `proc-nom.sql`
* `proc-verbe.sql`

We run these procedures many times, for each type of table. They form all the different 'types' of rows. For example:

```sql
call verbe('Inf::', 'Inf', '', '', '');
call verbe('Ind-pr:1:S', 'Ind-pr', '1', 'S', '');
```

The first row will generate all verbes, in Inf form.
The second row generates all verbes, in Ind-pr form, as 1st person and in singular.

We continue until we've generated all 'types'. At the end of main.sql, we insert for the gram table directly.