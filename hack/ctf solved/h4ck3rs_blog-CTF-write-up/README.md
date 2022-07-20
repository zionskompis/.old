http://solveme.kr/probs/17/6ff5342176684081043c4c85c52b5c65/

When I was looking thru the sourcecode I could se that read.js was loaded, the code was obfuscated, I used the great tool jsbeautifier.org to make the code more understandable.

This function looked intrestring:
```
$("[name='login']").submit(function() {
    if (hex_md5($("#pw").val()) == unescape(String.fromCharCode(37, 54, 53, 37, 51, 51, 37, 51, 49, 37, 51, 49, 37, 54, 52, 37, 54, 52, 37, 51, 53, 37, 54, 54, 37, 54, 52, 37, 51, 52, 37, 54, 51, 37, 54, 52, 37, 54, 50, 37, 54, 50, 37, 54, 49, 37, 51, 55, 37, 51, 56, 37, 51, 48, 37, 54, 53, 37, 54, 49, 37, 51, 48, 37, 54, 52, 37, 51, 48, 37, 51, 48, 37, 51, 54, 37, 51, 50, 37, 54, 52, 37, 54, 54, 37, 51, 55, 37, 51, 55, 37, 51, 56, 37, 51, 56))) {
        return true
    } else {
        $("#pw").val("");
        $("#pw").focus();
        return false
    }
});
```
Just extract the md5.
```
var h = String.fromCharCode(37, 54, 53, 37, 51, 51, 37, 51, 49, 37, 51, 49, 37, 54, 52, 37, 54, 52, 37, 51, 53, 37, 54, 54, 37, 54, 52, 37, 51, 52, 37, 54, 51, 37, 54, 52, 37, 54, 50, 37, 54, 50, 37, 54, 49, 37, 51, 55, 37, 51, 56, 37, 51, 48, 37, 54, 53, 37, 54, 49, 37, 51, 48, 37, 54, 52, 37, 51, 48, 37, 51, 48, 37, 51, 54, 37, 51, 50, 37, 54, 52, 37, 54, 54, 37, 51, 55, 37, 51, 55, 37, 51, 56, 37, 51, 56);
console.log(unescape(h));
```

So let's see if we can crack the hash, i always check with hashkiller.co.uk/md5-decrypter.aspx first, and they had it :)
```
e311dd5fd4cdbba780ea0d0062df7788 : christina
```
Jay, so now I can login to see the flag :)
```
The flag is..
The encrypted flag is Ó²æâ¶æÜ²°×Üî°ÜèíìÔÜú³öñÜáêÑ÷ëÇ·Ú.
```
The flag is just xor encrypted with a single key and you can see the code that is used on the post 'Coding is my life!'
```
function encrypt(str, key) {
    var enc = "";
    for (var i=0; i<str.length; i++) {
        enc += String.fromCharCode(str.charCodeAt(i) ^ key);
    }
    return enc;
} 
```
So the next step is to bruteforce the string.
```
function decrypt(str, key) {
    var dec = "";
    for (var i=0; i<str.length; i++) {
        dec += String.fromCharCode(str.charCodeAt(i) ^ key);

    }
    console.log(dec);

}
var str= "Ó²æâ¶æÜ²°×Üî°ÜèíìÔÜú³öñÜáêÑ÷ëÇ·Ú.";
var key= 0;
while(key < 1000){
	decrypt(str,key)
  key++;
}
```
And in the console you can see the flag after some iterations : P1ea5e_13T**********_biRthD4Y
