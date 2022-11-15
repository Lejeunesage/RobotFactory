let newStr= "asafasdhfasjkhfweoiuriujasfaksldjhalsjkhfjlkqaofadsfasasdfas";
       
function checkStringOccurnace(newStr){
    let finalStr = {};
    let checkArr = [];
    let counterArr = [];
    for(let i = 0; i < newStr.length; i++){
        if(checkArr.indexOf(newStr[i]) == -1){
            checkArr.push(newStr[i])
            let counter = 0;
            counterArr.push(counter + 1)
            finalStr[newStr[i]] = 1;
        }else if(checkArr.indexOf(newStr[i]) > -1){
            let index = checkArr.indexOf(newStr[i])
            counterArr[index] = counterArr[index] + 1;
            finalStr[checkArr[index]] = counterArr[index];
        }
    }
    return finalStr;
}

let demo = checkStringOccurnace(newStr);
console.log(" finalStr >> ", demo);



**************************************************************

let str = "je suis un beau gar"

function countChrOccurence (string) {
    let str = string.split(' ').join('')
    console.log(str);
    let charMap = new Map();
    const count = 0;
    for (const key of str) {
        charMap.set(key,count); 
        // initialize every character with 0. 
        this would make charMap to be 'h'=> 0, 'e' => 0, 'l' => 0, 
    }
    
    for (const key of str) {
        let count = charMap.get(key);
        charMap.set(key, count + 1);
     }
   // 'h' => 1, 'e' => 1, 'l' => 2, 'o' => 1
   
     for (const [key,value] of charMap) {
       return (key,value);
     }
   // ['h',1],['e',1],['l',2],['o',1]
   } 

   console.log(countChrOccurence (str));


****************************************************
       
       
// JavaScript code for the above approach...
 
let countCharacters = (string) => {
  let count = 1;
  for (let i = 0; i < string.length; i++) {
    if (string[i] === string[i + 1]) {
      count++;
    } else {
      console.log(`${string[i]} occur ${count} times`);
      count = 1;
    }
  }
};
 
countCharacters("hello");

















 
// This
