<div class="col-sm-3">
<?php
if(isset($_GET['id'])){ ?>
                    <div>
						<h3>新闻分类</h3>
						<ul class="nav nav-pills nav-stacked">
						  <?php 
                          $_result=mysql_query("select id,class from class where uptypeid='{$_html['id']}'");
                          $_number=mysql_num_rows($_result);
                          if($_number==0){
                          echo "<li>没有分类</li>";
                          }else{
	                      while(!!$_rows=mysql_fetch_array($_result)){ 
	                      echo "<li><a href=sqlgunclass.php?id=".$_rows['id'].">".$_rows['class']."</a></li>";
	                      tre($_rows['id'],1);		
	                         }
}
?>
						</ul>
						<hr class="hidden-sm hidden-md hidden-lg">
					</div>
<?php }?>
					<div>
						<h3>最新新闻</h3>
						<ul class="nav nav-pills nav-stacked">
						  <?php 
						  $_result=mysql_query("select id,title from news order by date DESC limit 0,{$_system['newsnums']}");
                          while(!!$_rows=mysql_fetch_array($_result)){?>
                          <li><a href="sqlgunnews.php?id=<?php echo $_rows['id']?>">
						  <?php echo mb_substr($_rows['title'],0,17,'utf-8') ?></a></li>
                          <?php }?>
						</ul>
						<hr class="hidden-sm hidden-md hidden-lg">
					</div>
					<div>
						<h3>最热新闻</h3>
						<ul class="nav nav-pills nav-stacked">
						<?php
						$_result=mysql_query("select id,title from news order by hits DESC limit 0,{$_system['hotnums']}");
                        while(!!$_rows=mysql_fetch_array($_result)){?>
                        <li><a href="sqlgunnews.php?id=<?php echo $_rows['id']?>"><?php echo mb_substr($_rows['title'],0,17,'utf-8') ?></a></li>
                        <?php }?>
						</ul>
						<hr class="hidden-sm hidden-md hidden-lg">
					</div>
</div>