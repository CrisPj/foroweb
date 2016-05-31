
<aside class="main-sidebar">
    <section style="height: auto;" class="sidebar">
        <div class="user-panel">
            <div class="pull-left image">
                <img src="dist/img/user2-160x160.jpg" class="img-circle" alt="Image">
            </div>
            <div class="pull-left info">
                <p>{$smarty.session['email']}</p>
            </div>
        </div>
        <br>
        <ul class="sidebar-menu">
            <li class="header">Control</li>
            <li class="active treeview">
                <a href="#">
                    <i class="fa fa-dashboard"></i> <span>Moderacion</span> <i class="fa fa-angle-left pull-right"></i>
                </a>
                <ul class="treeview-menu">
                    <li><a href="index.php?r=acategorias"><i class="fa fa-circle-o"></i>Categorias/ Post</a></li>
                    <li class="active"><a href="index.php?r=ausuarios"><i class="fa fa-circle-o"></i>Usuarios</a></li>
                </ul>
            </li>
        </ul>
    </section>
    <!-- /.sidebar -->
</aside>