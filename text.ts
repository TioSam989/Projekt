import { ClientFunction, Selector } from "testcafe";

fixture`Getting Started`.page`localhost/Projekt/index.php`; //moden
// fixture`Getting Started`.page`192.168.43.253/Projekt/index.php`; //celular

function getRandomValue() {
  return Math.floor(1000* Math.random() + 10);
}

//Randonizer Functions 
var randomValue = getRandomValue();
var randomUser = `Xpto${randomValue}`;
var randomPass = `Test123@${randomValue}`;

var RandomRange = (min:number, max:number) => Math.floor(Math.random()*(max-min))+min ;

//quando der mudar a funcao formaterDate pra essa
var a = (min, max) =>  Math.floor(Math.random()*(max-min)+min)
var RandomNumber = (num) => num<10 ? console.log('0'+num) : console.log(num)
var RandomPor = (min, max) =>  RandomNumber(a(min, max))

var randomDate:string = `${formaterDate(1980,2019)}-${formaterDate(1,12)}-${formaterDate(1,30)}`;
var listClass:Array<string> = ['10 - Programacao','11 - Programacao','11 - Informatica','12 - Informatica','10 - Quimica','11 - Quimica','10 - Eletrecidade','12 - Eletrecidade','11 - Desporto',];

var randomClass:string = `${listClass[Math.floor(Math.random()*listClass.length)]}`

function formaterDate(min, max){
  let num:number = RandomRange(min, max)
  let a:number = num
  
  if(a < 10){
    
    let b:string = '0' + num;

    return b;
  }else{

    return a;
  }
}

var uploadImage:Selector  = Selector("#nome_imagem");

const getLocation:Function = ClientFunction(() => document.location.href);

const dataSel:Selector = Selector('input[type=date]');

var submitButton3:Selector = Selector('#submit3');

//VARs
const classSelect:Selector = Selector('#turmaSelect');
const classOption:Selector = classSelect.find('option');

test("Registrar usuário xpto", async (t) => {
  await t
    .setNativeDialogHandler(() => true)

    //REGISTRAR 1
    .click(Selector("a").withText("Registrar"))
    .typeText("input[name=nome]", randomUser)
    .typeText("input[name=email]", `${randomUser}@xpto.com`)
    .typeText("input[name=username]", randomUser)
    .typeText("input[name=pass1]", randomPass)
    .typeText("input[name=pass2]", randomPass)  
    .pressKey('tab')
    .pressKey('space')
    .typeText(dataSel,randomDate)
    .click(Selector("button").withText("submeter"))

    //REGISTRAR 2
    .expect(getLocation()).contains("registrar2.php")
    .click(Selector("button").withText("OK"))
    .setFilesToUpload(uploadImage, './imagem_bot_conta.jpg')
    .click(Selector("button").withText("submeter"))
    .expect(getLocation()).contains("registrar3.php")

    //REGISTRAR 3
    .click(classSelect)
    .click(classOption.withText(`${randomClass}`))
    .click(Selector(submitButton3))

    .expect(getLocation()).contains("index.php");
});

test("Logar sem permissao", async (t) => {
  await t
    .setNativeDialogHandler(() => true)

    .click(Selector("a").withText("Logar"))
    .typeText("input[name=username]", randomUser)
    .typeText("input[name=password]", randomPass)
    .click(Selector("#submit"))
    .expect(getLocation()).contains("login.php");

});

test("ativar conta", async (t) => {
  await t
    .setNativeDialogHandler(() => true)

    .click(Selector("#filterHeader"))
    .click(Selector("a").withText("Admin"))
    .expect(getLocation()).contains("loginADM.php")
    .typeText("input[name=username]", "admin")
    .typeText("input[name=password]", "admin")
    .click(Selector("#submit"))
    .click(Selector("a").withText("Usuarios"))
    .expect(getLocation()).contains("verUsers.php")
    .typeText("input[name=id]", randomUser)
    .click(Selector("#bruh"))
    .click(Selector("a").withText("ativar"))
    .expect(getLocation()).contains("indexADM.php")
    .click(Selector("a").withText("Logout"))
    .expect(getLocation()).contains("index.php")
    ;
});

test("Logar na conta", async (t) => {
  await t
  
    .setNativeDialogHandler(() => true)

    .click(Selector("a").withText("Logar"))
    .typeText("input[name=username]", randomUser)
    .typeText("input[name=password]", randomPass)
    .click(Selector("#submit"))
    .click(Selector("button").withText("OK"))
    .expect(getLocation()).contains("indexUSER.php");
});

test("mudar a senha", async (t) => {
  await t
    .setNativeDialogHandler(() => true)

    .click(Selector("a").withText("Logar"))
    .typeText("input[name=username]", randomUser)
    .typeText("input[name=password]", randomPass)
    .click(Selector("#submit"))
    .click(Selector("button").withText("OK"))
    .expect(getLocation()).contains("indexUSER.php")

    .click(Selector("a").withText("meus dados"))
    .click(Selector("a").withText(" Mudar Password"))
    .expect(getLocation()).contains("mudarPass.php")
    .typeText("input[name=pass1]", randomPass)
    .typeText("input[name=pass2]", `${randomPass}123`)
    .typeText("input[name=pass3]", `${randomPass}123`)
    .click(Selector("button").withText("mudar"))
    .click(Selector("button").withText("OK"))

    .expect(getLocation()).contains("login.php")
    

;
});

test ("recolocar senha antiga", async (t) => {
  await t
  .click(Selector("a").withText("Logar"))
    .typeText("input[name=username]", randomUser)
    .typeText("input[name=password]", `${randomPass}123`)
    .click(Selector("#submit"))
    .click(Selector("button").withText("OK"))
    .expect(getLocation()).contains("indexUSER.php")

    .click(Selector("a").withText("meus dados"))
    .click(Selector("a").withText(" Mudar Password"))
    .expect(getLocation()).contains("mudarPass.php")
    .typeText("input[name=pass1]", `${randomPass}123`)
    .typeText("input[name=pass2]", `${randomPass}`)
    .typeText("input[name=pass3]", `${randomPass}`)
    .click(Selector("button").withText("mudar"))
    .click(Selector("button").withText("OK"))

    .expect(getLocation()).contains("login.php")

});


test("desativar conta ", async (t) => {
  await t
  .setNativeDialogHandler(() => true)

  .click(Selector("#filterHeader"))
  .click(Selector("a").withText("Admin"))
  .expect(getLocation()).contains("loginADM.php")
  .typeText("input[name=username]", "admin")
  .typeText("input[name=password]", "admin")
  .click(Selector("#submit"))
  .click(Selector("a").withText("Usuarios"))
  .expect(getLocation()).contains("verUsers.php")
  .typeText("input[name=id]", randomUser)
  .click(Selector("#bruh"))
  .click(Selector("a").withText("desativar"))
  .expect(getLocation()).contains("indexADM.php")
  .click(Selector("a").withText("Logout"))
  .expect(getLocation()).contains("index.php")
});

test("Reativar User", async (t) => {
  await t
  .setNativeDialogHandler(() => true)

  .click(Selector("#filterheader"))
  .click(Selector("a").withText("Admin"))
  .expect(getLocation()).contains("loginADM.php")
  .typeText("input[name=username]","admin")
  .typeText("input[name=password]","admin")
  .click(Selector("#submit"))
  .click(Selector("a").withText("Usuarios"))
  .expect(getLocation()).contains("verUsers.php")
  .typeText("input[name=id]", randomUser)
  .click(Selector("#bruh"))
  .click(Selector("a").withText("ativar"))
  .expect(getLocation()).contains("indexADM.php")
  .click(Selector("a").withText("Logout"))
  .expect(getLocation()).contains("index.php");
});