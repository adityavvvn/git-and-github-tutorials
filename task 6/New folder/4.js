function isFirstCharUppercase(str) {
 // Check if the string is non-empty and if the first character is uppercase
 return str.length > 0 && str[0] === str[0].toUpperCase();
}
// Sample usage
let testString = "Hello, world!";
if (isFirstCharUppercase(testString)) {
 console.log(`The first character of "${testString}" is uppercase.`);
} else {
 console.log(`The first character of "${testString}" is not uppercase.`);
}