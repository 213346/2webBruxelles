<?php


class User {
    public  $id;
    public  $username;
    public  $password;
    public  $phoneNumber;
    public  $lastName;
    public  $firstName;
    public  $address;
    public  $email;

    public function __construct($id,$username,$email,$password,$lastName,$firstName,$phoneNumber,$address) {
            $this->id = $id;
            $this->username = $username;
            $this->email = $email;
            $this->password = $password;
            $this->lastName = $lastName;
            $this->firstName =$firstName;
            $this->phoneNumber =$phoneNumber;
            $this->address = $address;
            

            /*
            $this->username = "admin";
            $this->password = "admin";
            $this->phoneNumber = "465 80 60 45";
            $this->lastName = "Takam";
            $this->firstName = "Danick";
            $this->address = "Kruisofstraat 144 boite 130 anvers 2020";
            $this->email = "213346@supinfo.com";

            */
    }

}
class Recipe {
         
    public $id;
    public $userId;
    public $name;
    public $type;//(cakes, soup, grill, etc.), 
    public $cookingTime; //02:03
    public $preparationtTime; // 00:11
    public $ingredients; 
    public $preparationSteps; 
    public $rate; 
    public $picture;
    

    public function __construct($id,$userId, $name, $type, $cookingTime, $preparationtTime, $ingredients, $preparationSteps, $rate, $picture) {
        $this->id = $id;
        $this->userId = $userId;
        $this->name = $name;
        $this->type = $type;
        $this->cookingTime = $cookingTime;
        $this->preparationtTime = $preparationtTime;
        $this->ingredients = $ingredients;
        $this->preparationSteps = $preparationSteps;
        $this->rate = $rate;
        $this->picture = $picture;
    }

}




try { 
    include_once ('db.php');
    
        //var_dump(LastRecipe());
        initUser();
        initRecipe();
        //findByIdUser(1);
        //findByIdRecipe(1);
       // echo(login("sdanicktakam@yahoo.fr","sadmin"));

       //echo(findByAllRecipe(""));

    //begin transaction 

        //connect the user return user if is ok  else return error
        if(isset($_REQUEST["login"])  && isset($_REQUEST["email"]) && isset($_REQUEST["password"]))  
        {
            $email = $_REQUEST["email"];
            $password = $_REQUEST["password"];
            echo login($email,$password);
            die();
        }
        elseif(isset($_REQUEST["countUser"]))
        {
           echo getCountUser();
           die();
        }
        elseif(isset($_REQUEST["countRecipe"]))
        {
           echo getCountRecipe();
           die();
        }
        //insert user to database return user if is ok  else return error
        elseif(isset($_REQUEST["register"])  && isset($_REQUEST["email"]) && isset($_REQUEST["password"])
            && isset($_REQUEST["username"])  && isset($_REQUEST["lastName"])  && isset($_REQUEST["firstName"])  
            && isset($_REQUEST["address"]) && isset($_REQUEST["phoneNumber"]) )  
        {
            
            $email = $_REQUEST["email"];
            $password = $_REQUEST["password"];
            $username = $_REQUEST["username"];
            $lastName = $_REQUEST["lastName"];
            $firstName = $_REQUEST["firstName"];
            $address = $_REQUEST["address"];
            $phoneNumber = $_REQUEST["phoneNumber"];
            $user = new User(null,$username,$email,$password,$lastName,$firstName,$phoneNumber,$address);
            insertUser($user);
            die();
        }
        //Update user, return user if is ok  else return error
        elseif(isset($_REQUEST["updateUser"])  && isset($_REQUEST["email"]) && isset($_REQUEST["password"])
            && isset($_REQUEST["username"])  && isset($_REQUEST["lastName"])  && isset($_REQUEST["firstName"])  
            && isset($_REQUEST["address"]) && isset($_REQUEST["phoneNumber"])  && isset($_REQUEST["id"]) )  
        {
            $id = $_REQUEST["id"];
            $email = $_REQUEST["email"];
            $password = $_REQUEST["password"];
            $username = $_REQUEST["username"];
            $lastName = $_REQUEST["lastName"];
            $firstName = $_REQUEST["firstName"];
            $address = $_REQUEST["address"];
            $phoneNumber = $_REQUEST["phoneNumber"];
            $user = new User($id,$username,$email,$password,$lastName,$firstName,$phoneNumber,$address);
            updateUser($user);
            die();
        }
        //delete user, return success else error
        elseif(isset($_REQUEST["deleteUser"]) && isset($_REQUEST["id"]) )  
        {
            $id = $_REQUEST["id"];
            deleteUser($id);
            die();
        }
          //find user by id, return user if is ok  else error
          elseif(isset($_REQUEST["findByIdUser"]) && isset($_REQUEST["id"]) )  
          {
              $id = $_REQUEST["id"];
               echo (findByIdUser($id));
              die();
          }
          //find  all User , return user if is ok  else error
          elseif(isset($_REQUEST["findByAllUser"]) )  
          {
            echo (findByAllUser());
              die();
          }
        //insert recipe to database return recipe if is ok  else return error
        elseif(isset($_REQUEST["insertRecipe"])  && isset($_REQUEST["userId"]) && isset($_REQUEST["type"])
            && isset($_REQUEST["cookingTime"])  && isset($_REQUEST["preparationtTime"])  && isset($_REQUEST["ingredients"])  
            && isset($_REQUEST["preparationSteps"]) && isset($_REQUEST["rate"]) && isset($_REQUEST["picture"]) )  
        {
            $name = $_REQUEST["name"];
            $userId = $_REQUEST["userId"];
            $type = $_REQUEST["type"];
            $cookingTime = $_REQUEST["cookingTime"];
            $preparationtTime = $_REQUEST["preparationtTime"];
            $ingredients = $_REQUEST["ingredients"];
            $preparationSteps = $_REQUEST["preparationSteps"];
            $rate = $_REQUEST["rate"];
            $picture = $_REQUEST["picture"];
            $recipe = new Recipe(null,$userId, $name, $type, $cookingTime, $preparationtTime, $ingredients, $preparationSteps, $rate, $picture);
            insertRecipe($recipe);
            die();
        }
        //Update recipe, return recipe if is ok  else return false
        elseif(isset($_REQUEST["updateRecipe"])  && isset($_REQUEST["userId"]) && isset($_REQUEST["type"])
            && isset($_REQUEST["cookingTime"])  && isset($_REQUEST["preparationtTime"])  && isset($_REQUEST["ingredients"])  
            && isset($_REQUEST["preparationSteps"]) && isset($_REQUEST["rate"]) && isset($_REQUEST["picture"]) && isset($_REQUEST["id"]))  
        {
            $name = $_REQUEST["name"];
            $userId = $_REQUEST["userId"];
            $type = $_REQUEST["type"];
            $cookingTime = $_REQUEST["cookingTime"];
            $preparationtTime = $_REQUEST["preparationtTime"];
            $ingredients = $_REQUEST["ingredients"];
            $preparationSteps = $_REQUEST["preparationSteps"];
            $rate = $_REQUEST["rate"];
            $picture = $_REQUEST["picture"];
            $id = $_REQUEST["id"];
            $recipe = new Recipe($id,$userId, $name, $type, $cookingTime, $preparationtTime, $ingredients, $preparationSteps, $rate, $picture);
            updateRecipe($recipe);
            die();
        }
        //Update recipe, return recipe if is ok  else return false
        elseif(isset($_REQUEST["updateRecipeRate"]) && isset($_REQUEST["rate"])  && isset($_REQUEST["id"]) )
        {
            $rate = $_REQUEST["rate"];
            $id = $_REQUEST["id"];
            $recipe = new Recipe($id,null,null, null, null, null, null, null, $rate,null);
            updateRecipeRate($recipe);
            die();
        }
        //delete user, return success else error
        elseif(isset($_REQUEST["deleteRecipe"]) && isset($_REQUEST["id"])  )  
        {
            $id = $_REQUEST["id"];
            deleteRecipe($id);
            die();
        }
        //find recipe by id, return recipe if is ok  else error
        elseif(isset($_REQUEST["findByIdRecipe"]) && isset($_REQUEST["id"]) )  
        {
            $id = $_REQUEST["id"];
            echo (findByIdRecipe($id));
            die();
        }
        //find  all recipe , return recipes if is ok  else error
        elseif(isset($_REQUEST["findByAllRecipe"]) && isset($_REQUEST["name"]) )  
        {
            $name = $_REQUEST["name"];
            echo (findByAllRecipe($name));
            die();
        }
        elseif(isset($_REQUEST["findByUserRecipe"]) && isset($_REQUEST["userId"]) ){
            $userId = $_REQUEST["userId"];
            echo findByUserRecipe($userId);
        }
        else{
            echo json_encode(["error"=>"not found"]);
        }
    //end transaction

} catch( PDOExecption $e ) { 
    $array['response'] = 'failed to  connect';
    //print_r($e);
    echo ( json_encode($array));
} 









// bigin manage user

    function insertUser(User $user)
    {
        global $dbh;
        // $dbh = $GLOBALS['dbh'];
        $stmt = $dbh->prepare("INSERT INTO user(username,email,password,lastName,firstName,phoneNumber,address) VALUES
                                               (:username, :email,:password,:lastName,:firstName,:phoneNumber,:address)");
        $password =  md5($user->password);
        $stmt->bindParam(':username', $user->username);
        $stmt->bindParam(':email', $user->email);
        $stmt->bindParam(':password', $password);
        $stmt->bindParam(':lastName', $user->lastName);
        $stmt->bindParam(':firstName', $user->firstName);
        $stmt->bindParam(':phoneNumber', $user->phoneNumber);
        $stmt->bindParam(':address', $user->address);
        if($stmt->execute() ) 
        {
            echo ( login($user->email, $user->password));
        }
        else
        {
            echo (json_encode(["error"=>$stmt->errorInfo()]));
        }

    }

    function updateUser(User $user)
    {
        $dbh = $GLOBALS['dbh'];
        $stmt = $dbh->prepare("UPDATE  user SET username=:username, email=:email ,password=:password,
                                                lastName=:lastName,firstName=:firstName,phoneNumber=:phoneNumber
                                                ,address=:address WHERE id=:id");
        $stmt->bindParam(':username', $user->username);
        $stmt->bindParam(':email', $user->email);
        $stmt->bindParam(':password',  $user->password);
        $stmt->bindParam(':lastName', $user->lastName);
        $stmt->bindParam(':firstName', $user->firstName);
        $stmt->bindParam(':phoneNumber', $user->phoneNumber);
        $stmt->bindParam(':address', $user->address);
        $stmt->bindParam(':id', $user->id);

        if($stmt->execute()) 
        {
            echo (login($user->email, $user->password));
        }
        else
        {
            echo (json_encode(["error"=>$stmt->errorInfo()]));
        }
        
    }


    function deleteUser($id)
    {
        $dbh = $GLOBALS['dbh'];
        $stmt = $dbh->prepare("DELETE FROM user WHERE id=:id");
        $stmt->bindParam(':id', $id);
        if($stmt->execute() ) 
        {
            echo (json_encode(["success"=>"Delete as successfull !"]));
        }
        else
        {
            echo (json_encode(["error"=>$stmt->errorInfo()]));
        } 
    }

    function login($email, $password)
    {
        $password = md5($password);
        $dbh = $GLOBALS['dbh'];
        $stmt = $dbh->prepare("SELECT * FROM user WHERE (email=:email or username=:email)  and password=:password");
        $stmt->bindParam(':email', $email);
        $stmt->bindParam(':password', $password);
        if($stmt->execute())
        {
            //$stmt->fetchAll(\PDO::FETCH_ASSOC);
            $result = $stmt->fetch(\PDO::FETCH_ASSOC);
            return json_encode($result);
        }
        else{
            return json_encode( ["error"=>$stmt->errorInfo()]);
        }
    }

    function findByIdUser($id)
    {
        $dbh = $GLOBALS['dbh'];
        $stmt = $dbh->prepare("SELECT * FROM user WHERE id=:id");
        $stmt->bindParam(':id', $id);
        if($stmt->execute())
        {
            //$stmt->fetchAll(\PDO::FETCH_ASSOC);
            $result = $stmt->fetch(\PDO::FETCH_ASSOC);
            return json_encode($result);
        }
        else{
            return json_encode( ["error"=>$stmt->errorInfo()]);
        }
    }

    function findByAllUser()
    {
        $dbh = $GLOBALS['dbh'];
        $stmt = $dbh->prepare("SELECT * FROM user ORDER BY id DESC");
        if($stmt->execute())
        {
            //$stmt->fetchAll(\PDO::FETCH_ASSOC);
            $result = $stmt->fetchAll(\PDO::FETCH_ASSOC);
            return json_encode($result);
        }
        else{
            return json_encode( ["error"=>$stmt->errorInfo()]);
        }
    }

    function getCountUser()
    {
        $dbh = $GLOBALS['dbh'];
        $stmt = $dbh->prepare("SELECT COUNT(*) as count FROM user ");
        if($stmt->execute())
        {
            //$stmt->fetchAll(\PDO::FETCH_ASSOC);
            $result = $stmt->fetchAll(\PDO::FETCH_ASSOC);
            return json_encode($result);
        }
        else{
            return json_encode( ["error"=>$stmt->errorInfo()]);
        }
    }



 //end manage user









// bigin manage recipe

function getCountRecipe()
{
    $dbh = $GLOBALS['dbh'];
    $stmt = $dbh->prepare("SELECT COUNT(*) as count FROM recipe");
    if($stmt->execute())
    {
        //$stmt->fetchAll(\PDO::FETCH_ASSOC);
        $result = $stmt->fetchAll(\PDO::FETCH_ASSOC);
        return json_encode($result);
    }
    else{
        return json_encode( ["error"=>$stmt->errorInfo()]);
    }
}


    function insertRecipe(Recipe $recipe)
    {
        $dbh = $GLOBALS['dbh'];
        $stmt = $dbh->prepare("INSERT INTO recipe(name,type,cookingTime,preparationtTime,ingredients,preparationSteps,rate,picture,userId) VALUES
                                                (:name,:type,:cookingTime,:preparationtTime,:ingredients,:preparationSteps,:rate,:picture,:userId)");
        $hashname =uniqid().".jpg"  ;                                  
        $stmt->bindParam(':name', $recipe->name);
        $stmt->bindParam(':type', $recipe->type);
        $stmt->bindParam(':cookingTime',  $recipe->cookingTime);
        $stmt->bindParam(':preparationtTime', $recipe->preparationtTime);
        $stmt->bindParam(':ingredients', $recipe->ingredients);
        $stmt->bindParam(':preparationSteps', $recipe->preparationSteps);
        $stmt->bindParam(':rate', $recipe->rate);
        $stmt->bindParam(':picture', $hashname );
        $stmt->bindParam(':userId', $recipe->userId);

        if($stmt->execute()) 
        {
            insertImageToFile($recipe->picture,$hashname);
            echo (LastRecipe());
        }
        else
        {
            echo ( json_encode(["error"=>$stmt->errorInfo()]));
        }

    }

    function updateRecipe(Recipe $recipe)
    {
        $dbh = $GLOBALS['dbh'];
        $stmt = $dbh->prepare("UPDATE  recipe SET name=:name,type=:type,cookingTime=:cookingTime,preparationtTime=:preparationtTime
                                                ,ingredients=:ingredients,preparationSteps=:preparationSteps,rate=:rate,picture=:picture,
                                                userId=:userId WHERE id=:id");

       // $hashname =uniqid().".jpg" ;                                
        $stmt->bindParam(':name', $recipe->name);
        $stmt->bindParam(':type', $recipe->type);
        $stmt->bindParam(':cookingTime',  $recipe->cookingTime);
        $stmt->bindParam(':preparationtTime', $recipe->preparationtTime);
        $stmt->bindParam(':ingredients', $recipe->ingredients);
        $stmt->bindParam(':preparationSteps', $recipe->preparationSteps);
        $stmt->bindParam(':rate', $recipe->rate);
        $stmt->bindParam(':picture', $recipe->picture );
        $stmt->bindParam(':userId', $recipe->userId);
        $stmt->bindParam(':id', $recipe->userId);

        if($stmt->execute()) 
        {
           // insertImageToFile($recipe->picture,$hashname);
            echo findByIdRecipe($recipe->id);
        }
        else
        {
            echo (json_encode(["error"=>$stmt->errorInfo()]));
        }
    
    }



    function updateRecipeRate(Recipe $recipe)
    {
        $dbh = $GLOBALS['dbh'];
        $stmt = $dbh->prepare("UPDATE  recipe SET rate=:rate WHERE id=:id");

        $stmt->bindParam(':rate', $recipe->rate);
        $stmt->bindParam(':id', $recipe->userId);

        $query = "UPDATE  recipe SET rate=".$recipe->rate." WHERE id=".$recipe->id;
        if($dbh->query($query)){
            echo findByIdRecipe($recipe->id);
        }
        else{
            echo (json_encode(["error"=>"false"]));
        }
        /*
        if($stmt->execute()) 
        {
           // insertImageToFile($recipe->picture,$hashname);
            echo findByIdRecipe($recipe->id);
        }
        else
        {
            echo (json_encode(["error"=>$stmt->errorInfo()]));
        }
        */
    
    }



    function deleteRecipe($id)
    {
        $dbh = $GLOBALS['dbh'];
        $stmt = $dbh->prepare("DELETE FROM recipe WHERE id=:id");
        $stmt->bindParam(':id', $id);
        $recipe = findByIdRecipe($id);
        if($stmt->execute() ) 
        {
            $upload_path = "uploads/".$recipe["picture"];
            unlink ($upload_path) ;
            echo (json_encode(["success"=>$recipe]));
        }
        else
        {
            echo (json_encode(["error"=>$stmt->errorInfo()]));
        } 
    }

    function findByIdRecipe($id)
    {
        $dbh = $GLOBALS['dbh'];
        $stmt = $dbh->prepare("SELECT * FROM recipe WHERE id=:id");
        $stmt->bindParam(':id', $id);
        if($stmt->execute())
        {
            //$stmt->fetchAll(\PDO::FETCH_ASSOC);
            $result = $stmt->fetch(\PDO::FETCH_ASSOC);
            return json_encode($result);
        }
        else{
            return json_encode( ["error"=>$stmt->errorInfo()]);
        }
    }

    function findByUserRecipe($userId)
    {
        $dbh = $GLOBALS['dbh'];
        $stmt = $dbh->prepare("SELECT * FROM recipe WHERE userId=:userId ORDER BY ID DESC ");
        $stmt->bindParam(':userId', $userId);
        if($stmt->execute())
        {
            //$stmt->fetchAll(\PDO::FETCH_ASSOC);
            $result = $stmt->fetchAll(\PDO::FETCH_ASSOC);
            return json_encode($result);
        }
        else{
            return json_encode( ["error"=>$stmt->errorInfo()]);
        }
    }


    function LastRecipe()
    {
        $dbh = $GLOBALS['dbh'];
        $stmt = $dbh->prepare("SELECT * FROM recipe WHERE id=(SELECT MAX(id) FROM recipe)");

        if($stmt->execute())
        {
            //$stmt->fetchAll(\PDO::FETCH_ASSOC);
            $result = $stmt->fetch(\PDO::FETCH_ASSOC);
            return json_encode($result);
        }
        else{
            return json_encode( ["error"=>$stmt->errorInfo()]);
        }
    }

    function getRightval($name){
        $result = "";
        $tab = str_split($name);
        foreach($tab as $str)
        {
            if($str!='"')
            {
                $result .=$str;
            }
        }
        return $result;
    }


    function findByAllRecipe($name)
    {
        $dbh = $GLOBALS['dbh'];
       /* 
        
        */
        //$name = str_replace($name,'"',"");
        //$name = "chicken";
        $name = getRightval($name);
        //var_dump($name);
        $stmt = $dbh->prepare("SELECT * FROM recipe WHERE name like ? OR ingredients like ?  OR preparationSteps like ? ORDER BY id DESC ");
   
        $params = array("%$name%","%$name%","%$name%");

        if($stmt->execute($params))
        {
            //$stmt->fetchAll(\PDO::FETCH_ASSOC);
            $result = $stmt->fetchAll(\PDO::FETCH_ASSOC);
            return json_encode($result);
        }
        else{
            return json_encode( ["error"=>$stmt->errorInfo()]);
        }
    }


    function insertImageToFile($img,$hashname)
    {
        $upload_path = "uploads/".$hashname;
        file_put_contents($upload_path,base64_decode($img));
    }

 //end manage recipe




    function initRecipe()
    {
            $result[] = new Recipe(null, 1,"Bolognaise", "Pastas", 10, 15, "30 g of butter\n1 tablespoon of olive oil\n1 bottle of tomato coulis\n200 g minced meat\nGarlic\nOnion\nPepper\nSalt", "Step 1\nIn a large saucepan, sauté garlic and onion in olive oil.\nStep 2\nGradually add the minced meat ....\nStep 3\nSalt, pepper.\nStep 4\nThen add the tomato coulis. If the sauce seems too thick, add a 1/2 glass of water ....\nStep 5\nSimmer on low heat for 10 minutes.\nStep 6\nAt the end of cooking, melt the butter in the sauce ...", 5, "https://image.afcdn.com/recipe/20161128/41991_w420h344c1cx1695cy1143.jpg");
            $result[] = new Recipe(null,2, "Orange Light Cake", "cakes", 45, 20, "Flour 180 g\nChemical yeast 1 bag\nSugar 90g\n3 eggs\nMilk 10 cl\n1 Orange\nOrange blossom water 1 tsp. soup\nLightened butter 80g\nLightened liquid cream 80cl\nLight orange jam 2 tbsp. soup", "Step 1\nPreheat the oven to 180 ° C (th 6). Pour the flour into a bowl and mix with the yeast and sugar. Take 2 strips of peel using a peeler and detail them into strips. Immerse them for 1 min in a small saucepan of boiling water. Drain and repeat the operation.\nStep 2\nSeparate the yolks from the whites of the eggs. Dig a well in the center of the flour / sugar mixture and then incorporate the milk, melted butter, cream, egg yolks and orange blossom water. Grate the equivalent of 1 teaspoon of zest and add it to the dough.\nStep 3\nBeat the egg whites and add them to the mixture. Pour the dough into a buttered and floured cake pan and bake for 40 minutes.", 3.5, "https://cac.img.pmdstatic.net/fit/https.3A.2F.2Fphoto.2Ecuisineactuelle.2Efr.2Fupload.2Fslideshow.2F50-recettes-de-cakes-simples-et-gourmands-23120.2Fcake-a-l-orange-allege-406183.2Ejpeg/1206x600/quality/65/cake-a-l-orange-allege.jpg");
            $result[] = new Recipe(null,4, "Pastas Lemon", "Pastas", 10, 5, "1 tray of fresh tagliatelle\n1 untreated lemon\n1 small glass of dry white wine\n1 piece of butter\n1 small pot of cream\nPepper\nSalt", "Step 1\nWash the lemon and grate the rind with a fine grater.\nStep 2\nSauté in a little butter over very low heat. When the butter begins to color for the white wine and let reduce 5 minutes.\nStep 3\nAdd cream, salt and pepper.\nStep 4\nPour over cooked pasta 'al dente'.", 4, null);
            $result[] = new Recipe(null,1, "onion soup", "soup", 25, 15, "4 onions\n50 g of butter\n1 tablespoon oil\n1 tablespoon flour\n25 cl of white wine\n1 liter of water\n6 slices of bread\n100 g grated cheese\nSalt\nPepper", "Step 1\nPeel and slice the onions.\nStep 2\nReturn to the butter and oil mixture until soft and lightly browned.\nStep 3\nSprinkle with the flour mixture, wet with hot water and white wine and season.\nStep 4\nCover and let it bubble gently for 20 minutes.\nStep 5\nGrill the bread.\nStep 6\nArrange each slice in the bottom of 4 small individual bowls that support the oven.\nStep 7\nSprinkle with some grated cheese. Pour the soup over it.\nStep 8\nSprinkle cheese again and brown.", 1, null);
            $result[] = new Recipe(null,3, "Chicken Grill", "grill", 140, 15, "1 chicken 1,2 kg\n50 g of butter\nHerbs\nSalt\nPepper\n20 potatos", "Step 1\nThis recipe is extremely simple.\nStep 2\nJust put the chicken in a baking dish.\nStep 3\nMeanwhile, preheat the oven to 210-240 ° C (thermostat 7-8).\nStep 4\nTake the butter and cut it into pieces to put it on the chicken everywhere.\nStep 5\nSalt, pepper and grass the beast ...\nStep 6\nNext, attack the potatoes ... Peel them and then soak them in the water to rinse and dry them.\nStep 7\nIt is necessary after cutting them.\nStep 8\nSo, that's how you feel ... make pretty shapes if you want me, I just make squares.\nStep 9\nIn fact, I take the potato, cut it in length, turn it, and then after cutting in the other length and then I turn it in the other direction to cut it in width ... and that, that, that do kinds of squares.\nStep 10\nAnd I put all the potatoes in the dish around the chicken. The dirty ones.\nStep 11\nAnd then direction the oven after watering everything half a glass of water.\nStep 12\nI cook 1h15 ... more or less depending on the chicken and potatoes.\nStep 13\nI turn it regularly during cooking, on each side ... And if necessary I darter water ... like that, potatoes bathe in the juice.\nStep 14\nOnce it's ready and good just serve!", 0, "https://image.afcdn.com/recipe/20180208/77447_w420h344c1cx1550cy1154cxt0cyt0cxb3100cyb2309.jpg");

            //insert
            for($i=0; $i<count($result); $i++)
            {
                insertRecipe($result[$i]);
            }
    }

    function initUser(){
        $result[] = new User(null,"stratege","sdanicktakam@yahoo.fr","sadmin","Takam","Danick","465 80 60 45","Kruisoftstraat 144 boite 130 anvers 2020");
        $result[] = new User(null,"ghislain","yarno@gmail.com","sadmin","Yankam","Arno","465 77 77 22","Olimpiade 120 boite 150 anvers 20");
        $result[] = new User(null,"chendjou","tallachendjou@yahoo.fr","sadmin","Talla","Ghislaine","465 78 45 11","Avenue louise 534 boite 150 buxelle 50");
        $result[] = new User(null,"will","kamgang@yahoo.fr","sadmin","Kamgang","Kinsley","465 00 10 05","Boom 111 boite 24 anvers 1001");
        
        //insert
        for($i=0; $i<count($result); $i++)
        {
            insertUser($result[$i]);
        }
    }


  
?>