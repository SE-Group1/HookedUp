<?php require '../tools.php';
    requireLoggedIn();
    
    $filter = getGETSafe('filter');
?>
<!DOCTYPE html>
<html>
<head>
    <?php require '../links.php'; ?>
    <style>
        .btn btn-success {
            align: right;
            padding:20px;
        }
    
        #nav {
            background-color: white;
            height: 1500px;
        }
        #nav-content {
            line-height: 30px;
            padding: 10px;
        }
        #section {
            width:1000px;
            height:120px;
            padding:10px; 
        }
    </style>
</head>
<body>
<?php require '../navbar.php'; ?>
<div class="row">
    <div id="nav" class="col-md-2">
        <div id="nav-content">
            Location<br>
            Company<br>
            Date Posted<br>
            Industry<br>
            Experience Level<br>
            <button type="button" class="btn btn-success">Filter</button> 
        </div>
    </div>
    <div class="col-md-6">
        <h2 class="page-title text-center">Search Results</h2>
        <?php 
        if(isset($filter)) {
            $result = makeAPIRequest("api/search/index.php", "GET", array(
                "filter" => $filter
            ));
            
            $users = $result['result']['users'];
            
            foreach ($users as $user) { 
                
                echo makeTemplateRequest("/user-card.php", "GET", array(
                    'userId' => $user['id']
                ));
            }
            
            /*$companies = $result['result']['companies'];
            foreach ($companies as $company) { ?>
                <div id="section">  
                <div class="col-lg-2"><br><img src="<?= getImageUrl($company['profileImageId']); ?>" width="100" height="100"></div> 
                <div><h4>Profile Type: Company</h4></div>   
                <div><h4><?= $company['name']?></h4></div>
                <button type="button" class="btn btn-success" onClick='/company'>View</button>     
            </div> 
            <?php } ?>*/
         } ?>
    </div>
</div>
    
</body>
</html>