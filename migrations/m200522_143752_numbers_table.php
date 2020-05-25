<?php

use yii\db\Migration;

/**
 * Class m200522_143752_numbers_table
 */
class m200522_143752_numbers_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $connection = Yii::$app->getDb();
        $command = $connection->createCommand("
        CREATE TABLE `_numbers` (
            `n` int(11) NOT NULL COMMENT 'https://stackoverflow.com/a/17942691.'
          ) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;");
        $command->execute();
        $command = $connection->createCommand("
          INSERT INTO `_numbers` (`n`) VALUES
          (1),
          (2),
          (3),
          (4),
          (5),
          (6),
          (7),
          (8),
          (9),
          (10),
          (11),
          (12),
          (13),
          (14),
          (15),
          (16),
          (17),
          (18),
          (19),
          (20),
          (21),
          (22),
          (23),
          (24),
          (25),
          (26),
          (27),
          (28),
          (29),
          (30),
          (31),
          (32),
          (33),
          (34),
          (35),
          (36),
          (37),
          (38),
          (39),
          (40),
          (41),
          (42),
          (43),
          (44),
          (45),
          (46),
          (47),
          (48),
          (49),
          (50),
          (51),
          (52),
          (53),
          (54),
          (55),
          (56),
          (57),
          (58),
          (59),
          (60),
          (61),
          (62),
          (63),
          (64),
          (65),
          (66),
          (67),
          (68),
          (69),
          (70),
          (71),
          (72),
          (73),
          (74),
          (75),
          (76),
          (77),
          (78),
          (79),
          (80),
          (81),
          (82),
          (83),
          (84),
          (85),
          (86),
          (87),
          (88),
          (89),
          (90),
          (91),
          (92),
          (93),
          (94),
          (95),
          (96),
          (97),
          (98),
          (99),
          (100);");
        $command->execute();
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $connection = Yii::$app->getDb();
        $connection->createCommand()
            ->dropTable('_numbers')->execute();
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m200522_143752_numbers_table cannot be reverted.\n";

        return false;
    }
    */
}
