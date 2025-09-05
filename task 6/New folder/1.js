function sumArray(numbers) {
 let sum = 0;
 for (let i = 0; i < numbers.length; i++) {
 sum += numbers[i];
 }
 return sum;
}
// Sample usage
let integers = [5, 10, 15, 20];
console.log("The sum of the array is:", sumArray(integers));