# Verbes pronominaux

A "verbe pronominal" is marked by the `pronominal` enum column in the formes table. It can have three values:

- `YES` (1): the verb is "pronominal", eg. "s'envoler",
- `BOTH` (2): the verb can be used in both forms, "pronominal" or not, eg. "apercevoir, s'apercevoir"
- `NO` (0): the verb is not "pronominal", eg. "manger".

This is an addition to the schema that isn't present in [the old interface](https://tal.lipn.univ-paris13.fr/morfetik1/), though it is backwards-compatible. (You can find the schema in `migrations/...morfetik_schema.php`.)

You can find the enum declaration in `models/enums/Pronominal.php`.