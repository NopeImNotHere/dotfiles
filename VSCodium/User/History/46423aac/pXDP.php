<ul>
<li class="dropdown">
      <a href="javascript:void(0)" class="dropbtn">Dropdown</a>
      <div class="dropdown-content">
        <a href="./player-create.php">Spieler erstellen</a>
        <a href="./trainer-create.php">Trainer erstellen</a>
        <a href="./team-create.php">Team erstellen</a>
        <a href="./add-trainer-team.php">Training zuweisen</a>
      </div>
    </li>
    <?php if(!isset($isAdmin)) {?>
    <li><a href="./admin-login.php">Admin Login</a></li>
    <?php } else {?>
    <li class="dropdown">
      <a href="javascript:void(0)" class="dropbtn">Admin Actions</a>
      <div class="dropdown-content">
        <a href="./admin-delete.php">Admin Deletion</a>
        <a href="./admin-edit.php">Admin Edditing</a>
      </div>
    </li>
    <?php }?>
</ul>