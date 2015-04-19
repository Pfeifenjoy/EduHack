<?php 
require_once 'classes/profile.class.php';

if(isset($_GET["uid"]))
{
	$profile = Profile::findOneById($_GET["uid"]);
}
else
{
	$profile = Profile::findOneByCurrentSession();
}

$myProfile = Profile::findOneByCurrentSession();

?>
<div class="col-md-3">
	<div class="side">
   		<img id="profile-pic" src="<?php echo $profile->getPictureUrl();?>" alt="Benutzerbild" />
	    <div class="user-data">
	        <h2><?php echo htmlspecialchars($profile->getUsername())?></h2>
	    	<span class="key">Community Rang:</span><span class="value">★★★☆☆</span><br/>
	    	<span class="key">Registriert seit:</span><span class="value"><?php echo date("d.m.Y", $profile->getRegistrationDate());?></span>
	    </div>
	    <div class="spacer"></div>
	</div>
	<h3>Kompetenzen</h3>
    <ul id="competence-container">
	<?php 
		$competences = Hashtag::findManyByProfile($profile);
		if(count($competences) == 0)
		{
			echo "<p>Noch keine.</p>";
		}
		foreach ($competences as $competence) {
			echo "<li>";
			echo htmlspecialchars($competence->getHashtag());
			echo "</li>";
		}
	?>
	</ul>
</div>
<div class="col-md-9">
	<h3>Gemeinsame Chats</h3>
	<?php 
	$chats = new Chat();
	$togetherChats = $chats->getTogetherChats($profile, $myProfile);
	foreach ($togetherChats as $chat) {
		?>
		<span class="chat"><?php echo htmlentities($chat["chat_title"]);?></span>
		<?php
	}
	?>
	<p class="no-chats">Du hattest bisher keinen Kontakt mit <?php echo htmlspecialchars($profile->getUsername())?>. </p>
	<button class="btn btn-success">Chat beginnen</button>
	<h3>Beantwortete Fragen</h3>
	<p class="no-questions"><?php echo htmlspecialchars(strtoupper(substr($profile->getUsername(), 0, 1)) . substr($profile->getUsername(), 1))?> hat noch keine Frage beantwortet.</p>
</div>
<div class="clear"></div>

<script src="js/profile.js"></script>
