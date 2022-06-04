class Animal {
    makeSound() {
        console.log('This animal made a sound.');
    }
}

class Monkey extends Animal {
    makeSound() {
        console.log('Uh ah ah.');
    }
}

class Dog extends Animal {
    makeSound() {
        console.log('Au au.');
    }
}

/**
 * 
 * @param {Monkey} monkey 
 */
function hurt(monkey) {
    console.log('I have hurted the dog.')
    dog.makeSound();
}

const ze = new Dog()
const ana = new Monkey()
// ze.makeSound()
// ana.makeSound();
hurt(ze);