<div class="col-md-3 side">
    <div class="user-img" style="width:50%; margin:0px auto; padding-top:10px;"><img src="img/login_bild.png" alt="Benutzerbild" /></div>
    <div class="user-data">
        <h2><?php echo $_SESSION['username'];?></h2>
        <span class="rank">Community Rang</span>
        <a href="">★★★☆☆</a>
    </div>
    <div class="spacer"></div>
</div>
<div class="col-md-5">
    <table id="profile" style="width:80%;">
      <tr>
        <th>Email:</th>
        <td><?php echo $_SESSION['email'];?></td>
      </tr>
      <tr>
        <th>Registriert seit:</th>
        <td><?php echo date("d.m.Y", intval($_SESSION['createTime']));?></td>
      </tr>    
    </table>
    <br />
    <br />
    <a class="btn btn-primary">Chat starten</a>
</div>
<div class="clear"></div>
<div>
    <h3>Kompetenzen</h3>
    <div id="compArea">
        <span class="label label-default">essen <span class="compRemove glyphicon glyphicon-remove"></span></span>
    </div>
    <br />
    <br />
    <form method="post" action="profile" class="col-md-4" id="addCompetence">
        <div class="input-group">
            <input id="newComp" type="text" class="form-control" placeholder="neue Kompetenz" />
            <span class="input-group-btn">
                <input type="submit" class="btn btn-primary" value="Hinzufügen" id="addComp" />
            </span>
        </div>
    </form>
</div>

<script src="js/profile.js"></script>
