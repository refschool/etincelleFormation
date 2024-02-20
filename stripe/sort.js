
let tab = [5, 3, 9, 7] //[3,5,7,9]

function compare(a, b) {
    if (a > b)
        return -1;
    if (a < b)
        return 1;
    // a doit être égal à b
    return 0;
}

let tabTrie = tab.sort(compare)
// 1 [5,3,9,7]
// 2 [3,5,9,7]
// 3 [3,5,7,9]
console.log(tabTrie)