<?php

use Phpmig\Migration\Migration;

class InsertRecomendToTerms extends Migration
{
    /**
     * Do the migration
     */
    public function up()
    {
        $sql = "INSERT INTO `zt_terms` (`id`, `parentid`, `name`, `module`, `setting`)
                VALUES
                    (1, 0, '橱窗推荐－网购设计主页', 'links', ''),
                    (2, 0, '橱窗推荐－网购设计页－设计师', 'links', ''),
                    (3, 0, '橱窗推荐－网购设计－设计师', 'links', ''),
                    (4, 0, '橱窗推荐－网购设计－工作室', 'links', ''),
                    (5, 0, '橱窗推荐－网购设计－每日低价', 'links', ''),
                    (6, 0, '橱窗推荐－设计库主页', 'links', '');
                ";
        $container = $this->getContainer(); 
        $container['db']->query($sql);
    }

    /**
     * Undo the migration
     */
    public function down()
    {
        $sql = "delete from zt_terms where id in (1,2,3,4,5,6)";
        $container = $this->getContainer(); 
        $container['db']->query($sql);
    }
}
