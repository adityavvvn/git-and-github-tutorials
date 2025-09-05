function isPalindrome(str) {
    // Convert the string to lowercase and remove non-alphanumeric characters
 let cleanedStr = str.toLowerCase().replace(/[^a-z0-9]/g, '');

 // Check if the cleaned string reads the same backward and forward
 let reversedStr = cleanedStr.split('').reverse().join('');
 return cleanedStr === reversedStr;
}
// Sample usage
let testString = "A man, a plan, a canal: Panama";
if (isPalindrome(testString)) {
 console.log(`"${testString}" is a palindrome.`);
} else {
 console.log(`"${testString}" is not a palindrome.`);
}
