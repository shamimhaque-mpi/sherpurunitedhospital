<style>
    ul li a span.icon{
        float: right;
        margin-right: 20px;
    }
</style>
<!-- Sidebar -->
<aside id="sidebar-wrapper">
    <div class="sidebar-nav">
        <h3 class="sidebar-brand"><a href="#"><span><?php echo $this->data['name']; ?></span></a></h3>
    </div>
    <nav>
        <ul class="sidebar-nav">
            <li id="altra">
                <a href="#altra_report" data-toggle="collapse">
                    <i class="fa fa-money" aria-hidden="true"></i>
                    &nbsp; Altra Report
                    <span class="icon"><i class="fa fa-sort-desc"></i></span>
                </a>

                <ul id="altra_report" class="sidebar-nav collapse">
                    <li>
                        <a href="<?php echo site_url('reports/ultra_report'); ?>">
                            <i class="fa fa-angle-right"></i>
                            New Report
                        </a>
                    </li>
                    <li>
                        <a href="<?php echo site_url('reports/ultra_report/all'); ?>">
                            <i class="fa fa-angle-right"></i>
                            All Report
                        </a>
                    </li>
                </ul>
            </li>
            
            <li id="mixed">
                <a href="#mixed_report" data-toggle="collapse">
                    <i class="fa fa-money" aria-hidden="true"></i>
                    &nbsp; Mixed Report
                    <span class="icon"><i class="fa fa-sort-desc"></i></span>
                </a>

                <ul id="mixed_report" class="sidebar-nav collapse">
                    <li>
                        <a href="<?php echo site_url('reports/mixed_reports'); ?>">
                            <i class="fa fa-angle-right"></i>
                            New Report
                        </a>
                    </li>
                    <li>
                        <a href="<?php echo site_url('reports/mixed_reports/all'); ?>">
                            <i class="fa fa-angle-right"></i>
                            All Report
                        </a>
                    </li>
                </ul>
            </li>
        </ul>
    </nav>
</aside>
<!-- /#sidebar-wrapper -->

<!--=================== online offline checker =========================-->
<style>
    .warning {
        height: 100vh;
        background: rgba(255, 255, 255, 0.85);
        display: flex;
        align-items: center;
        justify-content: center;
        width: 100%;
        position: fixed;
        z-index: 99999;
        top: 0;
        left: 0;
        user-select: none;
        color: red;
        font-family: serif;
        display: none;
    }
</style>

<div class="warning">
    <div>
        <h1>YOU'R OFFLINE</h1>
    </div>
</div>
<script>
    navigator.connection.onchange = function () {
        var warning = document.querySelector('.warning');
        if (navigator.onLine) {
            warning.style.display = 'none';
        } else {
            warning.style.display = 'flex';
        }
    }
</script>

<!--=================== End online offline checker =========================-->