<style><?php include 'side_menu.css'?></style>

<div class="nav-side-menu">
   <div class="brand">
      <a class="navbar-brand"><img src="imgs/logo.png" height="50" width="100"</a>
   </div>
   <i class="fa fa-bars fa-2x toggle-btn" data-toggle="collapse"
   data-target="#menu-content"></i>
   <div class="menu-list">
     <ul id="menu-content" class="menu-content collapse out">
       <li class="home">
         <a href="../admin/in_appart.php"><i class="fa fa-home fa-lg" aria-hidden="true"></i> Home</a>
       <li>
       <li>
         <a href="../admin/message.php"><i class="fas fa-envelope"></i> Messages</a>
       </li>
       <li>
         <a href="../admin/documents.php"><i class="fas fa-book" aria-hidden="true"></i> Documents</a>
       </li>
       <li>
         <a href="../admin/calendar.php"><i class="fas fa-book" aria-hidden="true"></i> Calendar</a>
       </li>
     </ul>
     <form action="my_functions.php" method="post">
       <button class="btn btn-primary logout" name="action"><i class="fas fa-sign-out-alt" aria-hidden="true"></i> Log out</button>
     </form>
   </div>
 </div>
