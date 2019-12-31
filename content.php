
  <?php
      if(isset($_GET['xem'])){
        $tam=$_GET["xem"];
      }
      else{
        $tam='';
        include('module/right/sachtatca.php');
      }
      if($tam=='a'){
        include('noidung/noidung.php');
      }
      elseif($tam=='b'){
        include('noidung/noidungsach.php');
      } elseif($tam=='c'){
        include('module/right/sachtheloai.php');
      }
      // elseif($tam=='chitietsach'){
      //   include('module/right/chitietsach.php');
      // }
      // elseif($tam=='tatcasach'){
      //   include('module/right/tatcasach.php');
      // }
      // else{
      //   include('module/right/gt.php');
      // }
     
      
    ?>