# Template
```php
include __DIR__."/../connect.php";
    if($offset<0){$offset=0;}
    if($limit<0){$limit=0;}
    if($limit != null){
        //Code
    }else{
        //Code
    }
    $res = mysqli_fetch_all(mysqli_query($conn,$sql),MYSQLI_ASSOC);
    mysqli_close($conn);
    return $res;
```
