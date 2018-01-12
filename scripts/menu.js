function DropDown(el, n) {
    this.name = n;
    this.dd = el;
    this.initEvents();
}
DropDown.prototype = {
    initEvents : function() {
        var obj = this;

        obj.dd.on('click', function(event){
            if(obj.name == 'dd'){
                $('#dd1').removeClass('active');
                $('#dd2').removeClass('active');
            }else if(obj.name == 'dd1'){
                $('#dd').removeClass('active');
                $('#dd2').removeClass('active');
            }else{
                $('#dd').removeClass('active');
                $('#dd1').removeClass('active');
            }
            $(this).toggleClass('active');
            event.stopPropagation();
        });
    }
}

$(function() {

    var dd = new DropDown( $('#dd'), 'dd');
    var dd1 = new DropDown( $('#dd1'), 'dd1');
    var dd2 = new DropDown( $('#dd2'), 'dd2');

    $(document).click(function() {
        $('.dropdown-button').removeClass('active');
    });
});
