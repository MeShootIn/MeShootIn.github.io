class Fraction{
    constructor(a, b){
        this.num = a;
        this.den = b;
    }

    reduce(){
        let k = gcd(this.num, this.den);

        this.num /= k;
        this.den /= k;

        if(this.den < 0){
            this.num *= -1;
            this.den *= -1;
        }
        
        return this;
    }

    value(){
        return this.num / this.den;
    }
}

function sum(A, B){
    return new Fraction(A.num * B.den + A.den * B.num, A.den * B.den);
}

function sub(A, B){
    B.num *= -1;

    return sum(A, B);
}

function mult(A, B){
    return new Fraction(A.num * B.num, A.den * B.den);
}

function div(A, B){
    B.den = [B.num, B.num = B.den][0];

    return mult(A, B);
}

function gcd(a, b){
    while(b != 0){
        a %= b;
        b = [a, a = b][0];
    }

    return a;
}