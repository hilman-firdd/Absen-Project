<body class="with-side-menu">
	<header class="site-header">
	    <div class="container-fluid">
	        <a href="page.php?s-home" class="site-logo">
	        <img class="hidden-md-down" src="assets/img/logo.png" alt="">
	        <img class="hidden-lg-up" src="assets/img/logo-mob.png" alt="">
	        </a>
			
	        <button id="show-hide-sidebar-toggle" class="show-hide-sidebar">
	        <span>toggle menu</span>
	        </button>
			
	        <button class="hamburger hamburger--htla">
	        <span>toggle menu</span>
	        </button>
			
	        <div class="site-header-content">
	            <div class="site-header-content-in">
	                <div class="site-header-shown">
	                    <div class="dropdown user-menu">
	                        <button class="dropdown-toggle" id="dd-user-menu" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
	           				<?php echo '<img src="'.$_SESSION['foto'].'" alt="" >'?>	
	                        </button>
	                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dd-user-menu">
	                            <a class="dropdown-item" href="page.php?s-detail-profil&id=<?php echo $_SESSION[id_user];?>"><span class="font-icon glyphicon glyphicon-user"></span>Profil</a>
	                            <a class="dropdown-item" href="page.php?s-edit-profil&id=<?php echo $_SESSION[id_user];?>"><span class="font-icon glyphicon glyphicon-cog"></span>Pengaturan</a>
	                            <a class="dropdown-item" href="page.php?s-bantuan"><span class="font-icon glyphicon glyphicon-question-sign"></span>Bantuan</a>
								<div class="dropdown-divider"></div>
	                            <a class="dropdown-item" href="page.php?keluar" onClick="return confirm('Yakin anda akan keluar?');"><span class="font-icon glyphicon glyphicon-log-out"></span>Keluar</a>
	                        </div>
	                    </div>
	                </div><!--.site-header-shown-->
	    			</div><!--.site-header-collapsed-in-->
					</div><!--.site-header-collapsed-->
	   			</div><!--site-header-content-in-->
			</div><!--.site-header-content-->
	    </div><!--.container-fluid-->
	</header><!--.site-header-->

	<div class="mobile-menu-left-overlay"></div>
	
	<nav class="side-menu">
    	<div class="side-menu-avatar">
	        <div class="avatar-preview avatar-preview-100">
	        <?php echo '<img src="'.$_SESSION['foto'].'" alt="" >'?>	
	        </div>
	    </div>
		
	    <ul class="side-menu-list">
	        <li class="green">
	            <a href="page.php?s-detail-profil&id=<?php echo $_SESSION['id_user'];?>">
	            <i class="font-icon font-icon-user"></i>
	            <span class="lbl">Profil</span>
	            </a>
	        </li>
			
			<li class="pink with-sub">
	            <span>
	            <i class="font-icon font-icon-event"></i>
	            <span class="lbl">Absen Siswa</span>
	            </span>
	            <ul>
	            <li>
				<?php 
				$query=mysql_query("SELECT * FROM kelas ORDER BY nm_kelas ASC",$connect);
				while($row=mysql_fetch_array($query))
				{
				?>
				<a href="page.php?absen-siswa&kelas=<?php  echo $row['nm_kelas']; ?>"> <span class="lbl"> Kelas <?php  echo $row['nm_kelas']; ?></span></a>
				<?php
				}
				?>
				</li>
	            </ul>
	        </li>
			
			<li class="blue with-sub">
	            <span>
	            <i class="font-icon font-icon-list-square"></i>
	            <span class="lbl">Lihat Absensi</span>
	            </span>
	            <ul>
	            <li>
				<?php 
				$query=mysql_query("SELECT * FROM kelas ORDER BY nm_kelas ASC",$connect);
				while($row=mysql_fetch_array($query))
				{
				?>
				<a href="page.php?data-absensi&kelas=<?php  echo $row['nm_kelas']; ?>&tanggal=<?php echo $tanggal=date("d/m/Y"); ?>"> <span class="lbl"> Kelas <?php  echo $row['nm_kelas']; ?></span></a>
				<?php
				}
				?>
				</li>
	            </ul>
	        </li>
	     
			<li class="purple">
	            <a href="page.php?s-data-kelas">
	            <i class="font-icon font-icon-learn"></i>
	            <span class="lbl">Data Kelas</span>
	            </a>
	        </li>
			
			<li class="coral with-sub">
	            <span>
	            <i class="font-icon font-icon-users"></i>
	            <span class="lbl">Data Siswa</span>
	            </span>
	            <ul>
				<li>
				<?php 
				$query=mysql_query("SELECT * FROM kelas ORDER BY nm_kelas ASC",$connect);
				while($row=mysql_fetch_array($query))
				{
				?>
				<a href="page.php?s-data-siswa&kelas=<?php  echo $row['nm_kelas']; ?>"> <span class="lbl"> Kelas <?php  echo $row['nm_kelas']; ?></span></a>
				<?php
				}
				?>
				</li>
	            </ul>
	        </li>
			
	       	<li class="green">
	            <a href="page.php?s-bantuan">
	            <i class="font-icon glyphicon glyphicon-question-sign"></i>
	            <span class="lbl">Bantuan</span>
	            </a>
	        </li>
			
	      	<li class="pink">
	            <a href="page.php?s-edit-profil&id=<?php echo $_SESSION['id_user'];?>">
	            <i class="font-icon glyphicon glyphicon-cog"></i>
	            <span class="lbl">Pengaturan</span>
	            </a>
	        </li> 
			
			<li class="blue">
	            <a href="page.php?s-about">
	            <i class="font-icon font-icon-fire"></i>
	            <span class="lbl">Tentang</span>
	            </a>
	        </li>
			
	      	<li class="purple">
	            <a href="page.php?keluar" onClick="return confirm('Yakin anda akan keluar?');">
	            <i class="font-icon glyphicon glyphicon-log-out"></i>
	            <span class="lbl">Keluar</span>
	            </a>
	        </li>
	    </ul>
	</nav><!--.side-menu-->