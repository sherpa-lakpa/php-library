<?php
  include_once('session.php');
  include_once('header.php');
  include_once('class.ManageBooks.php');
  include_once('manage.books.php');
?>

<div class="main_content">
<div class="displaycontainer"><Center>

  <img src="../gallery/logo/file.png" style="height:45px;width:45px;" id="search_image" onClick="search()">
    <section id="search">
      <form method="get" action="#" class="searching" >
        <input type="text" name="sname" placeholder="Search by Name..">
        <input type="submit" id="search_s" value="Search">
      </form></Center>
    </section>
<table class="table table-striped">
  <thead>
    <tr>
      <td>Sid</td>
      <td>fname</td>
      <td>Email</td>
      <td>Program</td>
      <td>Year</td>
      <td>Roll No</td>
      <td>Address</td>
      <td>Mobile</td>
      <td>Reg. Date</td>
      <td>Reg. Time</td>
      <td>Ip Address</td>
      <td>Action</td>
    </tr>
  </thead>
  <tbody>
    <tr>
    <?php
    if($_GET['sname'] == ""){

    if($list_student !== 0)
    {
      foreach ($list_student as $key => $value) {
        ?>
        <td><?php echo $value['sid']; ?></td>
        <td><?php echo $value['fname']; ?></td>
        <td><?php echo $value['email']; ?></td>
        <td><?php echo $value['program']; ?></td>
        <td><?php echo $value['year']; ?></td>
        <td><?php echo $value['roll_no']; ?></td>
        <td><?php echo $value['address']; ?></td>
        <td><?php echo $value['mobile']; ?></td>
        <td><?php echo $value['reg_date']; ?></td>
        <td><?php echo $value['reg_time']; ?></td>
        <td><?php echo $value['ip_address']; ?></td>
        <!--<td>
          <div class="progress progress-striped active">
          <div class="bar" style="width:<?php echo $value['progress'];?>%"></div>
          </div>
        </td>-->
        <td>
        <a href="list_student.php?delete=<?php echo $value['id'];?>"><button>Delete</button></a>
        </td>
        </tr>
        <?php
      }
    }else{
      echo '<td colspan="12">Sorry no more Student to show under this section/td>';
    }
    ?>
    </tr>
    <tr><td colspan="12"><?php echo $stu_pagination; ?></td></tr>
  <?php
    }else{
      echo $searched_s;
    }
  ?>
  </tbody>
  </table>
</div>


</div>
