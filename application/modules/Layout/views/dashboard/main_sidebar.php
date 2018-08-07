<!-- Left side column. contains the logo and sidebar -->
<aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">

        <!-- sidebar menu: : style can be found in sidebar.less -->
        <ul class="sidebar-menu" data-widget="tree">
            <li class="treeview">
                <?php if(count($menu) > 0): ?>
                    <?php foreach($menu as $nama_menu => $sub_menu): ?>
                        <a style="cursor: pointer">
                            <i class="<?= $sub_menu['menu_icon'] ?>"></i> <span><?= $nama_menu ?></span>
                            <span class="pull-right-container">
                                <i class="fa fa-angle-left pull-right"></i>
                            </span>
                        </a>
                        <ul class="treeview-menu">
                        <?php foreach($sub_menu['submenu_list'] as $key => $val_sub_menu): ?>
                            <li><a style="cursor: pointer" onclick="change_url('<?= site_url($val_sub_menu['controller_nama'])?>',null)"><i class="<?= $val_sub_menu['sub_menu_icon'] ?>"></i><?= $val_sub_menu['sub_menu_nama'] ?></a></li>
                        <?php endforeach ?>                            
                        </ul>
                    <?php endforeach ?>
                <?php else: ?>
                
                <?php endif ?>

                
                
            </li>
        </ul>
    </section>
    <!-- /.sidebar -->
</aside>