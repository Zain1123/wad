var user ={ name: "Zain Ali",balance: 4544784,currency: "PKR",ibn:"ABN261914"};
document.getElementById("title").innerHTML=user.name;
document.getElementById("balance").innerHTML=user.balance;
document.getElementById("currency").innerHTML=user.currency;
document.getElementById("IBAN").innerHTML=user.ibn;

function deposit(e){
    if(e.keyCode === 13){
        var value_enter = document.getElementById("deposit").value;
        var check = isNaN(value_enter);
        if(check === true)
        {
            document.getElementById("deposit-msg").innerHTML= "Enter Valid Amount!";
        }
        else{
            document.getElementById("deposit-msg").innerHTML= "";
            user.balance += parseInt(value_enter);
            document.getElementById("balance").innerHTML=user.balance;
            document.getElementById("deposit").value ="";
            display(value_enter,1);
        }
    }

}
function withdraw(e){
    if(e.keyCode === 13){
        var value_enter = document.getElementById("withdraw").value;
        var check = isNaN(value_enter);
        if(check === true)
        {
            document.getElementById("withdraw-msg").innerHTML= "Enter Valid Amount!";
        }
        else{
            document.getElementById("withdraw-msg").innerHTML= "";
            if(parseInt(value_enter)> user.balance){
                document.getElementById("withdraw-msg").innerHTML= "You have no much Amount in your account";
                document.getElementById("withdraw").value ="";
            }
            else{
                user.balance -= parseInt(value_enter);
                document.getElementById("balance").innerHTML=user.balance;
                document.getElementById("withdraw").value ="";
                display(value_enter,2);
            }
        }
    }

}
function display(enter,value){
    var tr = document.createElement('tr');
    var type;
    if(value === 1) {
        type = "Deposit";
    }
    else{
        type = "Withdraw";
    }

    var th = document.createElement('th');
    th.innerHTML = '<th align="left" valign="middle" scope="col">' + new Date() + '</th>';
    tr.appendChild(th);
    var th = document.createElement('th');
    th.innerHTML = '<th align="left" valign="middle" scope="col">' + type + '</th>';
    tr.appendChild(th);
    var th = document.createElement('th');
    th.innerHTML = '<th align="left" valign="middle" scope="col">' + enter + '</th>';
    tr.appendChild(th);
    document.getElementById("transaction-table").appendChild(tr);
}