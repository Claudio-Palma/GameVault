
function upadateCaseNumber(product, price, isIncreasing){
    const caseInput = document.getElementById(product + '-number');
    let caseNumber = caseInput.value;
            if(isIncreasing){
                caseNumber = parseInt(caseNumber) + 1;
            }
            
    else if(caseNumber > 0){
        caseNumber = parseInt(caseNumber) - 1;
    }
        
    caseInput.value = caseNumber;
        const caseTotal = document.getElementById(product + '-total');
        caseTotal.innerText = caseNumber * price;
        calculateTotal();
    }


    function getInputvalue(product){
        const productInput = document.getElementById(product + '-number');
        const productNumber = parseInt(productInput.value);
        return productNumber;
    }
    function calculateTotal(){
        const phoneTotal = getInputvalue('game') * 1219;
        const caseTotal = getInputvalue('game2') * 59;
        const subTotal = phoneTotal + caseTotal;
        const tax = subTotal / 10;
        const totalPrice = subTotal + tax;

        document.getElementById('sub-total').innerText = subTotal;
        document.getElementById('tax-amount').innerText = tax;
        document.getElementById('total-price').innerText = totalPrice;

    }





document.getElementById('game2-plus').addEventListener('click',function(){
    upadateCaseNumber('game2', 59 ,true);
});

document.getElementById('game2-minus').addEventListener('click',function(){
    upadateCaseNumber('game2', 59, false);
});

// phone prcie update using add event linstner 
document.getElementById('game-plus').addEventListener('click',function(){
    upadateCaseNumber('game',1219, true);
});


document.getElementById('game-minus').addEventListener('click',function(){
    upadateCaseNumber('game',1219 , false);
});
