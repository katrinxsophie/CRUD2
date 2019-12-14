<html>

 <style>
    body {
 background-image: url("flugi.jpeg") ;
 background-color: #cccccc;
        background-size: cover;
}
     h1 {
            
        margin-top: 30px;
            font-family: inherit;
            font-size: 30pt;
             }
        
         .auswahl {
             left: 100px;
         }
          .ausgabe {
            
         font-family: inherit;
            font-size: 15pt;
            font-weight: bold; 
         
        }
        
        
    </style>










<?php
if (!isset($_GET['edit-id'])){
                die("Edit-Id missing!");
            }
            else {
                $editId = $_GET['edit-id'];
            }
            if (isset($_GET['phrase'])){
                $phrase = $_GET['phrase'];
            }

include('config.php');

 $link = mysqli_connect("localhost", "root", "", "phrases");

 $updateSuccess = 0; 
            if (isset($_GET['btn-save'])){
                // create update statement 
                $sqlStmt = "UPDATE `phrases` SET `phrase` = '" . $phrase . "' WHERE `phrases`.`id` = " . $editId . ";";
                $result = $link->query($sqlStmt);
                
    
    if ($link->affected_rows > 0){
                    $updateSuccess = 1; 
        

  }
            }

 $sqlStmt = "SELECT * FROM `phrases` WHERE `id` = " . $_GET['edit-id'] ;
            $result = $link->query($sqlStmt);
            $row = mysqli_fetch_row($result); 
            // store current phrase in this row... 
            $currentPhrase = $row[1];
        ?>
                    

<head>
        <title>I say YES! to... </title>
    </head>

 <body>
  <form>      

<div class="Menue" align="center" margin-top="10px">

    <h1>Edit this phrase... </h1>
    
    
       <?php 
                if ($updateSuccess > 0){
            ?>
                    <div class="alert alert-primary" role="alert">
                        Update successful!<br>
                        Back to <a href="index.php">index </a>                        
                    </div>
            <?php
                }
            ?>

            <div class="row">
                <div class="col-md-9">
                    <input type="text" name="phrase" class="form-control" value='<?php echo $currentPhrase ?>'>
                    <input type="hidden" name="edit-id" value="<?php echo $editId ?>">
                </div>
            </div>        
            <div class="row" style="margin-top: 20px">
                <div class="col-md-6">Satz bitte bearbeiten
                </div>
                <div class="col-md-3">
                    <input type="submit" name="btn-save" class="form-control btn btn-success">
                </div>
            </div>
        </div>

        </form>    
    
    </body>
            	</html>
    