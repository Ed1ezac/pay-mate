<template>
    <!---Card Details-->
    <div class="mb-4">
        <div class="mt-1 relative">
            <input 
                v-model="cardNumber"
                v-card-number
                type="tel"
                required
                maxlength="19"
                name="card-number" id="card-number"            
                class="w-full font-bold pr-12"
                :class="cardErrors.length >0 ?'bg-red-200 border-red-400 focus:ring-red-400':''"
                autocomplete="off" placeholder="Card Number">
            <div class="absolute inset-y-0 flex right-0">
                <input 
                    ref="expiryField" 
                    v-card-expiry v-model="cardExpiry"
                    maxlength="9" required name="expiry"
                    class="h-full px-1 w-20 mt-0 font-bold border-transparent bg-transparent focus:ring-gray-800" placeholder="MM/YY">
                <input 
                    ref="cvcField" name="cvc"
                    v-card-cvc v-model="cardCvc" maxlength="3" 
                    class="h-full w-14 pr-1 mt-0 font-bold border-transparent bg-transparent focus:ring-gray-800" placeholder="CVC">
            </div>
        </div>
        <div v-if="cardErrors.length > 0">
            <span class="text-xs p-1 bg-red-100 rounded font-normal text-red-400" role="alert">
                <strong>{{ cardErrors.join() }}</strong>
            </span>
        </div>
    </div>
</template>

<script>
import { default as cardUtils } from './banking/utils.js';
import { default as cardCvcUtils } from './banking/cardCVCUtils.js';
import { default as cardNumberUtils } from './banking/cardNumUtils.js';
import { default as cardExpiryUtils } from './banking/cardExpiryUtils.js';
export default {
    data () {
        return {
            //quantity:'',
            //totalCost: 0,
            cardNumber: '',
            //cardName: '',
            cardExpiry: '',
            cardCvc: '',
            cardErrors: [],
            //unitPrice: '0.20',
            csrf: document.querySelector('meta[name="csrf-token"]').getAttribute('content')
        }
    },
    props:{
        validationErrors: {
            type:Array,
            default:[],
            //totalCost: String,
        },
    },
    methods:{
        submitForm: function(){
            if (this.isCardValid()) {
              this.$refs.purchaseForm.submit();
            }
        },
        isCardValid: function(){
            let isValid=true;
            this.cardErrors = [];
            if(!cardNumberUtils.validateCardNumber(this.cardNumber)){
                this.cardErrors.push("Invalid Credit Card Number");
                isValid=false;
            }
            if(!cardExpiryUtils.validateCardExpiry(this.cardExpiry)){
                this.cardErrors.push("Invalid Expiry Date");
                isValid=false;
            }
            if(!cardCvcUtils.validateCardCVC(this.cardCvc)){
                this.cardErrors.push("Invalid CVC.");
                isValid=false;
            }
            return isValid;
        },
        Watch:{
            cardNumber: function(val){
                console.log(val);
                if(cardNumberUtils.validateCardNumber(val)){
                    this.$refs.expiryField.focus();
                }
            },
            cardExpiry: function(val){
                if(cardExpiryUtils.validateCardExpiry(val)){
                    this.$refs.cvcField.focus();
                }
            }
        },
        Directives: {
            'card-number':{
                created(el){
                    el.addEventListener('keypress', cardUtils.restrictNumeric);
                    el.addEventListener('keypress', cardNumberUtils.restrictCardNumber);
                    el.addEventListener('keypress', cardNumberUtils.formatCardNumber);
                    el.addEventListener('keydown', cardNumberUtils.formatBackCardNumber);
                    //el.addEventListener('keyup', cardUtils.setCardType);
                    el.addEventListener('paste', cardNumberUtils.reFormatCardNumber);
                    el.addEventListener('change', cardNumberUtils.reFormatCardNumber);
                    el.addEventListener('input', cardNumberUtils.reFormatCardNumber);
                    //el.addEventListener('input', cardUtils.setCardType);
                }
            },
            'card-expiry':{
                created(el){
                    el.addEventListener('keypress', cardUtils.restrictNumeric);
                    el.addEventListener('keypress', cardExpiryUtils.formatExpiry);
                    el.addEventListener('keypress', cardExpiryUtils.formatForwardSlashAndSpace);
                    el.addEventListener('keypress', cardExpiryUtils.formatForwardExpiry);
                    el.addEventListener('keydown', cardExpiryUtils.formatBackExpiry);
                    el.addEventListener('change', cardExpiryUtils.reFormatExpiry);
                    el.addEventListener('input', cardExpiryUtils.reFormatExpiry);
                    el.addEventListener('blur', cardExpiryUtils.reFormatExpiry);
                }
            },
            'card-cvc':{
                created(el){
                    el.addEventListener('keypress', cardUtils.restrictNumeric);  
                    el.addEventListener('keypress', cardCvcUtils.restrictCVC);
                    el.addEventListener('paste', cardCvcUtils.reFormatCVC);
                    el.addEventListener('change', cardCvcUtils.reFormatCVC);
                    el.addEventListener('input', cardCvcUtils.reFormatCVC);
                }
            }
        },
    },
}
</script>