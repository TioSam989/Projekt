// /**
//  * FP 
//  * 1) usar somente parametros e nada mais
//  * 2) termos sempre um return, nunca void
//  * 3) iremos tratar nossos dados como imutaveis
//  * */
// function getLength(name: string) {
//     return name.length;
// }

// type Notas = [number, number, number, number]

// interface Materia {
//     name: string;
//     notas: Notas;
// }

// interface Aluno {
//     materias: Materia[]
// }

// // function passouDeAno(aluno: Aluno) {
// //     // Se todas as materias a media anual maior que 5, ele passou de ano
// //     const { materias } = aluno;

// //     let passeiDeAno = true;
// //     for (const materia of materias) {
// //         let total = 0;

// //         for (const nota of materia.notas) {
// //             total += nota;
// //         }

// //         const media = total / 4;

// //         passeiDeAno &&= (media >= 5);
// //     }

// //     return passeiDeAno;
// // }
// function getMaterias(aluno: Aluno) {
//     return aluno.materias;
// }

// function getNotas(materia: Materia) {
//     return materia.notas;
// }

// function soma(x: number, y: number) {
//     return x + y;
// }

// function somaDeNotas(notas: Notas) {
//     return notas.reduce(soma);
// }

// // Currying
// // fn(x, y)
// // fn(1, 2) => 3
// // fn(1) => fn(2) => 3

// function pegarMedia(divisor: number) {
//     return function (soma: number) {
//         return soma / divisor;
//     }
// }

// function passouDeAno(aluno: Aluno): boolean {
//     const materias = getMaterias(aluno);
//     // Contexto -> fn -> Context fn
//     materias
//         .map(getNotas)
//         .map(somaDeNotas)
//         .map(pegarMedia(4))
// }


// const davi: Aluno = {
//     materias: [
//         {
//             name: 'Quimica',
//             notas: [5, 5, 5, 5]
//         },
//         {
//             name: 'Fisica',
//             notas: [5, 5, 5, 5]
//         }
//     ]
// }

// console.log(passouDeAno(davi))
const inspect = Symbol.for('nodejs.util.inspect.custom');

function sum2(x: number) {
    return x + 2;
}

function sum(x: number) {
    return function (y: number) {
        return x + y;
    }
}

const Some = (value: any) => ({
    _tag: `Some(${value})`,
    value,
    [inspect]: () => `Some(${value})`,
    map: (fn: Function) => Some(fn(value)),
    fold: (_: Function, g: Function) => g(value),
})

const None = (value: any) => ({
    _tag: `None(${value})`,
    value,
    [inspect]: () => `None(${value})`,
    map: (_: Function) => None(value),
    fold: (f: Function, _: Function) => f(value),
})

type Maybe = {
    map(fn: Function): Maybe;
    fold(f: Function, g: Function): Maybe,
};

function fromNullable(value: any): Maybe {
    if (value) {
        return Some(value);
    } else {
        return None(value);
    }
}

const box = fromNullable(null);

console.log(
    JSON.stringify(
        box
            .map(sum(2))
            .map(sum(3))
            .map(sum(1))
            .fold(() => 'Não tenho valor', (x: any) => x)
    )
);