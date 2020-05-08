<?php

use yii\db\Migration;

/**
 * Class m181215_032343_route_dan_role
 */
class m181215_032343_route_dan_role extends Migration
{
    public function safeUp()
    {

        $this->batchInsert(
            'auth_item', 
            [
                'name',
                'type',
                'description',
                'rule_name',
                'data',
                'created_at',
                'updated_at'
            ], 
            [
                ['OPD', '1', null, null, null, '1544843711', '1544843711'],
                ['/debug/user/*', '2', null, null, null, '1544843753', '1544843753'],
                ['/mimin/*', '2', null, null, null, '1544843754', '1544843754'],
                ['/mimin/route/*', '2', null, null, null, '1544843756', '1544843756'],
                ['/site/*', '2', null, null, null, '1544843757', '1544843757'],
                ['/user/*', '2', null, null, null, '1544844580', '1544844580'],
                ['/ajax-load/*', '2', null, null, null, '1544844580', '1544844580'],
                ['/ajax/*', '2', null, null, null, '1544844580', '1544844580'],
            ]
        );

        $this->batchInsert(
            'auth_item_child', 
            [
                'parent',
                'child',
            ], 
            [
                ['Admin', '/debug/user/*'],
                ['Admin', '/mimin/*'],
                ['Admin', '/mimin/route/*'],
                ['Admin', '/user/*'],
                ['Admin', '/site/*'],
                ['Admin', '/ajax/*'],
        );

        $this->batchInsert(
            'auth_assignment', 
            [
                'item_name',
                'user_id',
                'created_at',
            ], 
            [
                ['Bappeda', '1', '1544844990']
            ]
        );

        $this->batchInsert(
            'route', 
            [
                'name',
                'alias',
                'type',
                'status'
            ], 
            [
                ['/mimin/role/index', 'index', 'mimin/role', '1'],
                ['/mimin/role/view', 'view', 'mimin/role', '1'],
                ['/mimin/role/create', 'create', 'mimin/role', '1'],
                ['/mimin/role/update', 'update', 'mimin/role', '1'],
                ['/mimin/role/delete', 'delete', 'mimin/role', '1'],
                ['/mimin/role/permission', 'permission', 'mimin/role', '1'],
                ['/mimin/role/*', '*', 'mimin/role', '1'],
                ['/mimin/route/index', 'index', 'mimin/route', '1'],
                ['/mimin/route/view', 'view', 'mimin/route', '1'],
                ['/mimin/route/create', 'create', 'mimin/route', '1'],
                ['/mimin/route/update', 'update', 'mimin/route', '1'],
                ['/mimin/route/delete', 'delete', 'mimin/route', '1'],
                ['/mimin/route/generate', 'generate', 'mimin/route', '1'],
                ['/mimin/route/*', '*', 'mimin/route', '1'],
                ['/mimin/user/index', 'index', 'mimin/user', '1'],
                ['/mimin/user/view', 'view', 'mimin/user', '1'],
                ['/mimin/user/create', 'create', 'mimin/user', '1'],
                ['/mimin/user/update', 'update', 'mimin/user', '1'],
                ['/mimin/user/delete', 'delete', 'mimin/user', '1'],
                ['/mimin/user/*', '*', 'mimin/user', '1'],
                ['/mimin/*', '*', 'mimin', '1'],
                ['/gii/*', '*', 'gii', '1'],
                ['/file/show', 'show', 'file', '1'],
                ['/file/download', 'download', 'file', '1'],
                ['/file/*', '*', 'file', '1'],
                ['/site/error', 'error', 'site', '1'],
                ['/site/index', 'index', 'site', '1'],
                ['/site/login', 'login', 'site', '1'],
                ['/site/logout', 'logout', 'site', '1'],
                ['/site/*', '*', 'site', '1'],
                ['/user/index', 'index', 'user', '1'],
                ['/user/view', 'view', 'user', '1'],
                ['/user/create', 'create', 'user', '1'],
                ['/user/update', 'update', 'user', '1'],
                ['/user/delete', 'delete', 'user', '1'],
                ['/user/bulk-delete', 'bulk-delete', 'user', '1'],
                ['/user/*', '*', 'user', '1'],
                ['/*', '*', '', '1'],
                
            ]
        );

    }

    public function safeDown()
    {
        // echo "m181215_032343_route_dan_role cannot be reverted.\n";\
        $this->truncateTable('auth_item')->execute();
        $this->truncateTable('auth_item_child')->execute();
        $this->truncateTable('auth_assignment')->execute();
        $this->truncateTable('route')->execute();

        return false;
    }
}
