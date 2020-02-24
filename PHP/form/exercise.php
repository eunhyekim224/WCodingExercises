
<?php
	if (isset($_POST['gender']) OR isset($_POST['lastNameText']) OR isset($_POST['firstNameText']) OR isset($_POST['ageText']) OR isset($_POST['loginText']) OR isset($_POST['passwordText']) OR isset($_POST['confirmPwText']) OR isset($_POST['countrySelect'])) {
?>
	<div>
		<p>Your gender is: 
            <?php 
            if (isset($_POST['gender']) && $_POST['gender'] == 'female') {
                echo "Woman";
            } elseif (isset($_POST['gender']) && $_POST['gender'] == 'male') {
                echo "Man";
            } else {
                echo "You didn't select a gender";
            } 
            ?> 
        </p>
		<p>Your last name is: 
			<?php
			 echo (strlen($_POST['lastNameText']) >=2 ) ? $_POST['lastNameText'] : "You didn't type a valid last name";
			?>	
		</p>
		<p>Your first name is: 
			<?php 
			echo (strlen($_POST['firstNameText']) >=2 ) ? $_POST['firstNameText'] : "You didn't type a valid first name"; 
			?>
		</p>
		<p>Your age is: 
			<?php 
				echo ((int)($_POST['ageText'])>=5 AND (int)($_POST['ageText'])<=140 ) ? $_POST['age'] : "You didn't type a valid age";
			?>
		</p>
		<p>Your login is : 
            <?php 
            echo (strlen($_POST['loginText']) >= 4) ?  $_POST['loginText'] : "You didn't type a valid login"; 
            ?>
        </p>
		<p>
			<?php
			if ($_POST['passwordText'] === $_POST['confirmPwText']) {
                echo "<span onclick="."alert('".$_POST['passwordText']."');><strong>Click here</strong> for your password <span>";
			} else {
                echo "There is a problem with your password, please register again";
            }
			?>
		</p>
		<p>Your country is 
            <?php 
            echo $_POST['countrySelect'] 
            ?>
        </p>
		<p>Newsletter activation :
            <?php 
            echo (isset($_POST['signUp'])) ? "You will receive the newsletter" : "No newsleter for you :)";
			?>
		</p>
	</div>
<?php
}
?>