function isMajor(person) {
    console.log('isMajor')
    // const name = person.name;
    // const age = person.age;
    // Deconstructing
    const { name, age } = person;

    return age >= 18
        ? name.length > 4
            ? `${name} is a major and has a big name`
            : `${name} is a major and has a smallllll name`
        : name.length < 5
            ? `A minor with a small name, no one needs to know`
            : `${name} is a minor.`;
}

function isExpansive() {
    /** Finge que aqui o navegador praticamente trava. */
    console.log('isExpansive');
    return false;
}

function isTall(person) {
    const { name, height } = person;

    if (height > 1.50 || isExpansive() && isMajor(person)) {
        return `${name} is tall`
    } else {
        return `${name} is short`
    }
}

function getWeight(person) {
    const { weight } = person;

    return weight || 75;
}

function calculateIMC(person) {
    let { weight, height } = person;

    /**
     * Short circuit para definir valores padrões.
     */
    height = height || 1.70;
    weight = weight || 75;

    console.log({ height, weight });

    return weight / (height * height);
}

const luciano = { name: 'Luciano', age: 30, weight: 90, height: 1.75 };
const helena = { name: 'Helena', age: 1, height: 1, weight: 12 };
const davi = { name: 'Davi', age: 16, height: 1.78, weight: 70 };
// console.log(isMajor(luciano))
console.log(calculateIMC(davi))










function toHexa(num){
    console.clear();
    for (let index = 0; index < num +1; index++) {
        console.log(`pos: ${index} - hexa: ${index.toString(16)}`)
        console.log(``)
    }
}