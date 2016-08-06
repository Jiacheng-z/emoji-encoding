# emoji-encoding
对emoji表情进行编码并且不会编码中文，使其能正常存入mysql中字段类型为utf8而非utf8mb4的字段中。

Make emoji char can save in mysql field types of utf-8.

## demo
```php
$str = "mixed,中文,😘";
//encode
$enStr = Emoji::Encode($str);
//decode
$deStr = Emoji::Decode($enStr);
//$deStr will is "mixed,中文,😘"
```





