// ==UserScript==
// @name         S2 helper functions
// @namespace    http://tampermonkey.net/
// @version      1.1.1
// @description  try to take over the world!
// @author       You
// @match        https://*/*
// @icon         https://www.google.com/s2/favicons?sz=64&domain=google.com
// @grant        none
// ==/UserScript==


toastr.options = {
  "closeButton": true,
  "debug": false,
  "newestOnTop": false,
  "progressBar": false,
  "positionClass": "toast-bottom-right",
  "preventDuplicates": false,
  "onclick": null,
  "showDuration": "300",
  "hideDuration": "1500",
  "timeOut": "2000",
  "extendedTimeOut": "1500",
  "showEasing": "swing",
  "hideEasing": "linear",
  "showMethod": "fadeIn",
  "hideMethod": "fadeOut"
}


let uriMain = window.location.host;

console.log('S2 helper v1.1.1');
/*Переходим в атвоматизацию*/
/*$('body').on('click','.label.label-default:contains("auto")',function(){
    let id = $(this).attr('data-original-title').split('ID: ')
    window.open('https://'+uriMain+'/settings/scenarios/'+id[1]+'/edit', '_blank')
})
*/
$('body').on('click','.top-line', function(){
    let id = $(this).text()
    id = id.split('ID: ');id = id[1].replaceAll(')', ''); id = id.replaceAll(' ', '');
    window.open('https://'+uriMain+'/settings/scenarios/'+id+'/edit', '_blank')
})




/*Открываем/Закрываем активности*/
$('body').on('click','.ibox-header:contains("Активность")', function(e){
        let op = prompt('Открыть или закрыть все загр. активности? 1 - открыть, 0 - закрыть')
        if (op == 1 ) {
            $('.changes-collapse.collapse').addClass('in')
            $('.descr-toggle').removeClass('collapsed')
        }
        if (op == 0) {
            $('.changes-collapse.collapse').removeClass('in')
            $('.descr-toggle').addClass('collapsed')
        }
})

/*Показать Id и ссылки на Сценарии по кнопкам*/
$('body').on('click','.ibox-header:contains("Действия"):not(".use")', function(e){
	$(this).addClass('use')
	$('.ibox-content.remote-content a.scenario-btn.js-scenario-btn').each(function(){
    	$(this).text($(this).find('.js-scenario-text-name').text() + ' ID:' + JSON.parse($(this).attr('data-params')).scenario_id)
    	$(this).after(`<a style="margin: 10px 0 20px;display: block;text-align: center;" href="https://${uriMain}/settings/scenarios/${JSON.parse($(this).attr('data-params')).scenario_id}/edit" target="_blank">перейти в сценарий ID: ${JSON.parse($(this).attr('data-params')).scenario_id}</a>`)
	})
})

/*Кликаем по ID из модального окна с Юзером переходим в его настройки */
$('body').on('click','.card-modal[data-model="User"] .form-group[data-field="id"] .ts-value', function(e){
	window.open('https://'+uriMain+'/settings/users/'+$(this).text()+'/edit', '_blank')
})


/*Вывести всех объекты из левой колонки в правую (старница пользователей, доп. полей и прочее)*/
$('body').on('click','.settings-subhead.col-xs-8 .ss-left', function(e){
	alert('Сейчас будет что-то загружено')
	let links = []
	$('.settings-droppable.ui-droppable a').each(function(){
		links.push($(this).attr('data-source'))
	})
	$('.col-xs-8.settings-main-content.settings-main-remote').html('')
	for (let i = 0; i<links.length; i++) {
		$('.col-xs-8.settings-main-content.settings-main-remote').append($('<div>').load(links[i]));
	}
})


/*Скрыть или показать все уведомления, которые надо прочитать*/

$(document).ready(function(){
	if (localStorage.getItem('hideNotifications') == null || localStorage.getItem('hideNotifications') == 'false') {
        var style = '<style>#toast-container-bottom-left,#toast-container {display: block;}</style>';
		$(document.body).append(style);
		$('.wrapper.page-footer .pf-right').prepend(`<label>Cкрыть все уведомления<input id="hideNotifications" style="margin: 4px 0 0 4px" type="checkbox"></label>`)
	} else {
        var style = '<style>#toast-container-bottom-left,#toast-container {display: none;}</style>';
		$(document.body).append(style);
		$('.wrapper.page-footer .pf-right').prepend(`<label>Cкрыть все уведомления<input id="hideNotifications" style="margin: 4px 0 0 4px" type="checkbox" checked></label>`)
	}
})

$('body').on('change', '#hideNotifications', function(){

	if ($(this).is(':checked')) {
		localStorage.setItem('hideNotifications', true)
        var style = '<style>#toast-container-bottom-left,#toast-container {display: none;}</style>';
		$(document.body).append(style);

	}
	else {
		localStorage.setItem('hideNotifications', false)
		var style = '<style>#toast-container-bottom-left,#toast-container {display: block;}</style>';
		$(document.body).append(style);

	}
})


/*Показать ID атвоматизации по нажатию Хлебной крошки*/
$('body').on('click', '.settings-header-main.pull-left', function(){
    let text = $('#scenario-form').attr('action')
    $(this).text('https://'+uriMain+text+'/edit')
})

/*Показать ID межобъектного сценария по нажатию "Запустить сценарий по объекту"*/
$('body').on('click', '.pane-header', function(){
    let text = $(this).parents('.scenario-callback').attr('data-scenario')
    $(this).text('https://'+uriMain+'/settings/scenarios/'+text+'/edit')
})


/*Выделить все загруженные элементы*/
$('body').on('dblclick','.modal-dialog .active .bind-tab:contains("Найдено")', function(){
	console.log("doubleclick")
	$('.bind-form-body.tab-content .tab-pane>div').each(function(){
		$(this).find('div').last().children().last().click()
	})
})


/*Ctrl+Alt+A Прокликать все label в открытом модально окне*/
document.addEventListener ("keydown", function (zEvent) {
    if (zEvent.ctrlKey  &&  zEvent.altKey  &&  zEvent.key === "a" || zEvent.ctrlKey  &&  zEvent.altKey  &&  zEvent.key === "ф") {  // case sensitive
        $('.modal-dialog').last().find('label').click()
        console.log('ща шото буде')
    }
} );



//Создание своих полей

let crf = $('meta[name=csrf-token]').attr('content')
let modes = [
['users_and_roles', 'contacts','companies','deals','orders','diary','projects','products','entries','contact_groups','contracts','telephony_calls','segments','checkups','estate','documents','invoice_payments','invoices'],
['User', 'Contact','Company','Deal','Order','Diary','Project','Product','Entry','ContactGroup','Contract','TelephonyCall','Segment','Checkup','EstateProperty','DocumentTemplateRender','InvoicePayment','Invoice']]
let indexArray;
window.tab = $('.settings-main .settings-main-tabs .settings-droppable.active').attr('data-id')


window.addFieldes =  function addFieldes(number) {
	window.tab = $('.settings-main .settings-main-tabs .settings-droppable.active').attr('data-id')
	debugger
	if (window.tab == undefined) {alert("Не смог определить категорию, проверьте чтобы была активная категория"); return}
	fetch('https://'+uriMain+'/settings/custom_fields', {
	  "headers": {
	    "accept": "*/*;q=0.5, text/javascript, application/javascript, application/ecmascript, application/x-ecmascript",
	    "accept-language": "ru",
	    "content-type": "application/x-www-form-urlencoded; charset=UTF-8",
	    "sec-ch-ua": "\"Google Chrome\";v=\"105\", \"Not)A;Brand\";v=\"8\", \"Chromium\";v=\"105\"",
	    "sec-ch-ua-mobile": "?0",
	    "sec-ch-ua-platform": "\"Windows\"",
	    "sec-fetch-dest": "empty",
	    "sec-fetch-mode": "cors",
	    "sec-fetch-site": "same-origin",
	    "x-csrf-token": `${crf}`,
	    "x-requested-with": "XMLHttpRequest"
	  },
	  "referrerPolicy": "strict-origin-when-cross-origin",
	  "body": `${bodyFields(modes,indexArray,tab)[number-1]}`,
	  "method": "POST",
	  "mode": "cors",
	  "credentials": "include"
	}).then(()=>toastr.info('Поле '+number+' создано!', 'Информация'));
}

$('body').on('click','#modal_custom_field_new .modal-header', function(){

	window.tab = $('.settings-main .settings-main-tabs .settings-droppable.active').attr('data-id')
	crf = $('meta[name=csrf-token]').attr('content')
    console.log("Создаю поле")
	let params = window.location.search.replace('?','').split('&').reduce(function(p,e){var a = e.split('=');p[ decodeURIComponent(a[0])] = decodeURIComponent(a[1]);return p;},{});
    indexArray = modes[0].indexOf(params.mode.replace(':custom_fields',''));
    // console.log(indexArray);
    let div = `<div id="addFieldsWrapper" style="overflow: auto; position: absolute; opacity: 0.8; inset: 0px; background: rgb(221, 221, 221); z-index: 999; padding: 5px; display: block;"> <div id="addFields" class="btn btn-primary" style="margin-bottom: 10px">Добавить все поля</div> <div id="closeFieldsWrapper" onclick="$('#addFieldsWrapper').hide()" style="position: fixed; right: 100px;" class="btn btn-danger">Закрыть</div> Уточните, какое поле необходимо создать (Введите "all", если все). Варианты: <p>1. Текст - Текст <span onclick="addFieldes(1)" class="btn btn-primary" style="margin-left: 5px">+</span></p> <p>2. Текст - Адрес <span onclick="addFieldes(2)" class="btn btn-primary" style="margin-left: 5px">+</span></p> <p>3. Текст - Город <span onclick="addFieldes(3)" class="btn btn-primary" style="margin-left: 5px">+</span></p> <p>4. Текст - Регион <span onclick="addFieldes(4)" class="btn btn-primary" style="margin-left: 5px">+</span></p> <p>5. Текст - Телефон <span onclick="addFieldes(5)" class="btn btn-primary" style="margin-left: 5px">+</span></p> <p>6. Текст - Телефон (неск. значений) <span onclick="addFieldes(6)" class="btn btn-primary" style="margin-left: 5px">+</span></p> <p>7. Текст - Телефон (системный вид) <span onclick="addFieldes(7)" class="btn btn-primary" style="margin-left: 5px">+</span></p> <p>8. Текст - Телефон (неск. зн + сист. вид) <span onclick="addFieldes(8)" class="btn btn-primary" style="margin-left: 5px">+</span></p> <p>9. Текст - email <span onclick="addFieldes(9)" class="btn btn-primary" style="margin-left: 5px">+</span></p> <p>10. Текст - email (неск. значений) <span onclick="addFieldes(10)" class="btn btn-primary" style="margin-left: 5px">+</span></p> <p>11. Текст - ссылка <span onclick="addFieldes(11)" class="btn btn-primary" style="margin-left: 5px">+</span></p> <p>12. Текст - ссылка (неск. значений) <span onclick="addFieldes(12)" class="btn btn-primary" style="margin-left: 5px">+</span></p> <p>13. Число <span onclick="addFieldes(13)" class="btn btn-primary" style="margin-left: 5px">+</span></p> <p>14. Число - Целое <span onclick="addFieldes(14)" class="btn btn-primary" style="margin-left: 5px">+</span></p> <p>15. Число - Свое зн. <span onclick="addFieldes(15)" class="btn btn-primary" style="margin-left: 5px">+</span></p> <p>16. Число - Валюта (USD, $) <span onclick="addFieldes(16)" class="btn btn-primary" style="margin-left: 5px">+</span></p> <p>17. Число - Валюта (Баз знака) <span onclick="addFieldes(17)" class="btn btn-primary" style="margin-left: 5px">+</span></p> <p>18. Дата <span onclick="addFieldes(18)" class="btn btn-primary" style="margin-left: 5px">+</span></p> <p>19. Дата и Время <span onclick="addFieldes(19)" class="btn btn-primary" style="margin-left: 5px">+</span></p> <p>20. Дата и Время и Календарь задач <span onclick="addFieldes(20)" class="btn btn-primary" style="margin-left: 5px">+</span></p> <p>21. Список - Выпадающий (одно значение) <span onclick="addFieldes(21)" class="btn btn-primary" style="margin-left: 5px">+</span></p> <p>22. Список - Выпадающий (мн. выбор) <span onclick="addFieldes(22)" class="btn btn-primary" style="margin-left: 5px">+</span></p> <p>23. Список - Флажки (одно значение) <span onclick="addFieldes(23)" class="btn btn-primary" style="margin-left: 5px">+</span></p> <p>24. Список - Флажки (мн. выбор) <span onclick="addFieldes(24)" class="btn btn-primary" style="margin-left: 5px">+</span></p> <p>25. Список (внешний источник) (одно знач.) <span onclick="addFieldes(25)" class="btn btn-primary" style="margin-left: 5px">+</span></p> <p>26. Список (внешний источник) (мн. выбор) <span onclick="addFieldes(26)" class="btn btn-primary" style="margin-left: 5px">+</span></p> <p>27. Файл (не публ.) <span onclick="addFieldes(27)" class="btn btn-primary" style="margin-left: 5px">+</span></p> <p>28. Файл (публичный) <span onclick="addFieldes(28)" class="btn btn-primary" style="margin-left: 5px">+</span></p> <p>29. Формула <span onclick="addFieldes(29)" class="btn btn-primary" style="margin-left: 5px">+</span></p> <p>30. Рейтинг <span onclick="addFieldes(30)" class="btn btn-primary" style="margin-left: 5px">+</span></p> <p>31. Связь - Заявки <span onclick="addFieldes(31)" class="btn btn-primary" style="margin-left: 5px">+</span></p> <p>32. Связь - Компании <span onclick="addFieldes(32)" class="btn btn-primary" style="margin-left: 5px">+</span></p> <p>33. Связь - Сделки <span onclick="addFieldes(33)" class="btn btn-primary" style="margin-left: 5px">+</span></p> <p>34. Связь - Контакты <span onclick="addFieldes(34)" class="btn btn-primary" style="margin-left: 5px">+</span></p> <p>35. Связь - Продукты <span onclick="addFieldes(35)" class="btn btn-primary" style="margin-left: 5px">+</span></p> <p>36. Связь - Сотрудники <span onclick="addFieldes(36)" class="btn btn-primary" style="margin-left: 5px">+</span></p> <p>37. Связь - Задачи <span onclick="addFieldes(37)" class="btn btn-primary" style="margin-left: 5px">+</span></p> <p>38. Связь - События <span onclick="addFieldes(38)" class="btn btn-primary" style="margin-left: 5px">+</span></p> <p>39. Связь - Записи <span onclick="addFieldes(39)" class="btn btn-primary" style="margin-left: 5px">+</span></p> <p>40. Связь - Документы <span onclick="addFieldes(40)" class="btn btn-primary" style="margin-left: 5px">+</span></p> <p>41. Связь - Договоры <span onclick="addFieldes(41)" class="btn btn-primary" style="margin-left: 5px">+</span></p> <p>42. Связь - Визиты <span onclick="addFieldes(42)" class="btn btn-primary" style="margin-left: 5px">+</span></p> <p>43. мн. Связь - Компании <span onclick="addFieldes(43)" class="btn btn-primary" style="margin-left: 5px">+</span></p> <p>44. мн. Связь - Сделки <span onclick="addFieldes(44)" class="btn btn-primary" style="margin-left: 5px">+</span></p> <p>45. мн. Связь - Заявки <span onclick="addFieldes(45)" class="btn btn-primary" style="margin-left: 5px">+</span></p> <p>46. мн. Связь - Контакты <span onclick="addFieldes(46)" class="btn btn-primary" style="margin-left: 5px">+</span></p> <p>47. мн. Связь - Продукты <span onclick="addFieldes(47)" class="btn btn-primary" style="margin-left: 5px">+</span></p> <p>48. мн. Связь - Сотрудники <span onclick="addFieldes(48)" class="btn btn-primary" style="margin-left: 5px">+</span></p> <p>49. мн. Связь - Задачи <span onclick="addFieldes(49)" class="btn btn-primary" style="margin-left: 5px">+</span></p> <p>50. мн. Связь - События <span onclick="addFieldes(50)" class="btn btn-primary" style="margin-left: 5px">+</span></p> <p>51. мн. Связь - Записи <span onclick="addFieldes(51)" class="btn btn-primary" style="margin-left: 5px">+</span></p> <p>52. мн. Связь - Документы <span onclick="addFieldes(52)" class="btn btn-primary" style="margin-left: 5px">+</span></p> <p>53. мн. Связь - Договоры <span onclick="addFieldes(53)" class="btn btn-primary" style="margin-left: 5px">+</span></p> <p>54. мн. Связь - Компании (чт. всего списка) <span onclick="addFieldes(54)" class="btn btn-primary" style="margin-left: 5px">+</span></p> <p>55. мн. Связь - Сделки (чт. всего списка) <span onclick="addFieldes(55)" class="btn btn-primary" style="margin-left: 5px">+</span></p> <p>56. мн. Связь - Заявки (чт. всего списка) <span onclick="addFieldes(56)" class="btn btn-primary" style="margin-left: 5px">+</span></p> <p>57. мн. Связь - Контакты (чт. всего списка) <span onclick="addFieldes(57)" class="btn btn-primary" style="margin-left: 5px">+</span></p> <p>58. мн. Связь - Продукты (чт. всего списка) <span onclick="addFieldes(58)" class="btn btn-primary" style="margin-left: 5px">+</span></p> <p>59. мн. Связь - Сотрудники (чт. всего спи... <span onclick="addFieldes(59)" class="btn btn-primary" style="margin-left: 5px">+</span></p> <p>60. мн. Связь - Задачи (чт. всего списка) <span onclick="addFieldes(60)" class="btn btn-primary" style="margin-left: 5px">+</span></p> <p>61. мн. Связь - События (чт. всего списка) <span onclick="addFieldes(61)" class="btn btn-primary" style="margin-left: 5px">+</span></p> <p>62. мн. Связь - Записи (чт. всего списка) <span onclick="addFieldes(62)" class="btn btn-primary" style="margin-left: 5px">+</span></p> <p>63. мн. Связь - Документы (чт. всего списка) <span onclick="addFieldes(63)" class="btn btn-primary" style="margin-left: 5px">+</span></p> <p>64. мн. Связь - Договоры (чт. всего списка) <span onclick="addFieldes(64)" class="btn btn-primary" style="margin-left: 5px">+</span></p> <p>65. Расчетный список <span onclick="addFieldes(65)" class="btn btn-primary" style="margin-left: 5px">+</span></p> <p>66. мн. Расчетный список <span onclick="addFieldes(66)" class="btn btn-primary" style="margin-left: 5px">+</span></p> <p>67. Дерево <span onclick="addFieldes(67)" class="btn btn-primary" style="margin-left: 5px">+</span></p> <p>68. (мн.) Дерево <span onclick="addFieldes(68)" class="btn btn-primary" style="margin-left: 5px">+</span></p> <p>69. Курс валюты (USD) <span onclick="addFieldes(69)" class="btn btn-primary" style="margin-left: 5px">+</span></p> <p>70. Курс валюты (EUR) <span onclick="addFieldes(70)" class="btn btn-primary" style="margin-left: 5px">+</span></p> <p>71. Нумератор (инкремент) <span onclick="addFieldes(71)" class="btn btn-primary" style="margin-left: 5px">+</span></p> <p>72. Нумератор (инкремент + шаблон) <span onclick="addFieldes(72)" class="btn btn-primary" style="margin-left: 5px">+</span></p></div>`;
    //<div id="addFields" class="btn btn-primary">Добавить</div>
    //<div id="closeFieldsWrapper" class="btn btn-danger">Закрыть</div>
    if ($('#addFieldsWrapper').html() != undefined) $('#addFieldsWrapper').show()
    else $('#wrapper').append(div);
})

function getRand(max = 10000) {
  return Math.floor(Math.random() * max);
}

function bodyFields(modes,indexArray, tab ) { return [`utf8=%E2%9C%93&class_name=${modes[1][indexArray]}&custom_field%5Bname%5D=1.+%D0%A2%D0%B5%D0%BA%D1%81%D1%82+-+%D0%A2%D0%B5%D0%BA%D1%81%D1%82++${getRand()}&type=text&custom_field%5Bcustom_field_category_id%5D=${tab}&custom_field%5Bacts_like%5D=text&custom_field%5Bprefix%5D=&custom_field%5Brequired%5D=0&custom_field%5Bmultiple%5D=0&custom_field%5Bbeauty_phone%5D=0`,
`utf8=%E2%9C%93&class_name=${modes[1][indexArray]}&custom_field%5Bname%5D=2.+%D0%A2%D0%B5%D0%BA%D1%81%D1%82+-+%D0%90%D0%B4%D1%80%D0%B5%D1%81++${getRand()}&type=text&custom_field%5Bcustom_field_category_id%5D=${tab}&custom_field%5Bacts_like%5D=address&custom_field%5Bprefix%5D=&custom_field%5Brequired%5D=0&custom_field%5Bmultiple%5D=0&custom_field%5Bbeauty_phone%5D=0`,
`utf8=%E2%9C%93&class_name=${modes[1][indexArray]}&custom_field%5Bname%5D=3.+%D0%A2%D0%B5%D0%BA%D1%81%D1%82+-+%D0%93%D0%BE%D1%80%D0%BE%D0%B4++${getRand()}&type=text&custom_field%5Bcustom_field_category_id%5D=${tab}&custom_field%5Bacts_like%5D=city&custom_field%5Bprefix%5D=&custom_field%5Brequired%5D=0&custom_field%5Bmultiple%5D=0&custom_field%5Bbeauty_phone%5D=0`,
`utf8=%E2%9C%93&class_name=${modes[1][indexArray]}&custom_field%5Bname%5D=4.+%D0%A2%D0%B5%D0%BA%D1%81%D1%82+-+%D0%A0%D0%B5%D0%B3%D0%B8%D0%BE%D0%BD++${getRand()}&type=text&custom_field%5Bcustom_field_category_id%5D=${tab}&custom_field%5Bacts_like%5D=region&custom_field%5Bprefix%5D=&custom_field%5Brequired%5D=0&custom_field%5Bmultiple%5D=0&custom_field%5Bbeauty_phone%5D=0`,
`utf8=%E2%9C%93&class_name=${modes[1][indexArray]}&custom_field%5Bname%5D=5.+%D0%A2%D0%B5%D0%BA%D1%81%D1%82+-+%D0%A2%D0%B5%D0%BB%D0%B5%D1%84%D0%BE%D0%BD++${getRand()}&type=text&custom_field%5Bcustom_field_category_id%5D=${tab}&custom_field%5Bacts_like%5D=phone&custom_field%5Bprefix%5D=&custom_field%5Brequired%5D=0&custom_field%5Bmultiple%5D=0&custom_field%5Bbeauty_phone%5D=0`,
`utf8=%E2%9C%93&class_name=${modes[1][indexArray]}&custom_field%5Bname%5D=6.+%D0%A2%D0%B5%D0%BA%D1%81%D1%82+-+%D0%A2%D0%B5%D0%BB%D0%B5%D1%84%D0%BE%D0%BD+(%D0%BD%D0%B5%D1%81%D0%BA.+%D0%B7%D0%BD%D0%B0%D1%87%D0%B5%D0%BD%D0%B8%D0%B9)++${getRand()}&type=text&custom_field%5Bcustom_field_category_id%5D=${tab}&custom_field%5Bacts_like%5D=phone&custom_field%5Bprefix%5D=&custom_field%5Brequired%5D=0&custom_field%5Bmultiple%5D=0&custom_field%5Bmultiple%5D=1&custom_field%5Bbeauty_phone%5D=0`,
`utf8=%E2%9C%93&class_name=${modes[1][indexArray]}&custom_field%5Bname%5D=7.+%D0%A2%D0%B5%D0%BA%D1%81%D1%82+-+%D0%A2%D0%B5%D0%BB%D0%B5%D1%84%D0%BE%D0%BD+(%D1%81%D0%B8%D1%81%D1%82%D0%B5%D0%BC%D0%BD%D1%8B%D0%B9+%D0%B2%D0%B8%D0%B4)++${getRand()}&type=text&custom_field%5Bcustom_field_category_id%5D=${tab}&custom_field%5Bacts_like%5D=phone&custom_field%5Bprefix%5D=&custom_field%5Brequired%5D=0&custom_field%5Bmultiple%5D=0&custom_field%5Bbeauty_phone%5D=0&custom_field%5Bbeauty_phone%5D=1`,
`utf8=%E2%9C%93&class_name=${modes[1][indexArray]}&custom_field%5Bname%5D=8.+%D0%A2%D0%B5%D0%BA%D1%81%D1%82+-+%D0%A2%D0%B5%D0%BB%D0%B5%D1%84%D0%BE%D0%BD+(%D0%BD%D0%B5%D1%81%D0%BA.+%D0%B7%D0%BD+%2B+%D1%81%D0%B8%D1%81%D1%82.+%D0%B2%D0%B8%D0%B4)++${getRand()}&type=text&custom_field%5Bcustom_field_category_id%5D=${tab}&custom_field%5Bacts_like%5D=phone&custom_field%5Bprefix%5D=&custom_field%5Brequired%5D=0&custom_field%5Bmultiple%5D=0&custom_field%5Bmultiple%5D=1&custom_field%5Bbeauty_phone%5D=0&custom_field%5Bbeauty_phone%5D=1`,
`utf8=%E2%9C%93&class_name=${modes[1][indexArray]}&custom_field%5Bname%5D=9.+%D0%A2%D0%B5%D0%BA%D1%81%D1%82+-+email++${getRand()}&type=text&custom_field%5Bcustom_field_category_id%5D=${tab}&custom_field%5Bacts_like%5D=email&custom_field%5Bprefix%5D=&custom_field%5Brequired%5D=0&custom_field%5Bmultiple%5D=0&custom_field%5Bbeauty_phone%5D=0`,
`utf8=%E2%9C%93&class_name=${modes[1][indexArray]}&custom_field%5Bname%5D=10.+%D0%A2%D0%B5%D0%BA%D1%81%D1%82+-+email+(%D0%BD%D0%B5%D1%81%D0%BA.+%D0%B7%D0%BD%D0%B0%D1%87%D0%B5%D0%BD%D0%B8%D0%B9)++${getRand()}&type=text&custom_field%5Bcustom_field_category_id%5D=${tab}&custom_field%5Bacts_like%5D=email&custom_field%5Bprefix%5D=&custom_field%5Brequired%5D=0&custom_field%5Bmultiple%5D=0&custom_field%5Bmultiple%5D=1&custom_field%5Bbeauty_phone%5D=0`,
`utf8=%E2%9C%93&class_name=${modes[1][indexArray]}&custom_field%5Bname%5D=11.+%D0%A2%D0%B5%D0%BA%D1%81%D1%82+-+%D1%81%D1%81%D1%8B%D0%BB%D0%BA%D0%B0++${getRand()}&type=text&custom_field%5Bcustom_field_category_id%5D=${tab}&custom_field%5Bacts_like%5D=url&custom_field%5Bprefix%5D=&custom_field%5Brequired%5D=0&custom_field%5Bmultiple%5D=0&custom_field%5Bbeauty_phone%5D=0`,
`utf8=%E2%9C%93&class_name=${modes[1][indexArray]}&custom_field%5Bname%5D=12.+%D0%A2%D0%B5%D0%BA%D1%81%D1%82+-+%D1%81%D1%81%D1%8B%D0%BB%D0%BA%D0%B0+(%D0%BD%D0%B5%D1%81%D0%BA.+%D0%B7%D0%BD%D0%B0%D1%87%D0%B5%D0%BD%D0%B8%D0%B9)++${getRand()}&type=text&custom_field%5Bcustom_field_category_id%5D=${tab}&custom_field%5Bacts_like%5D=url&custom_field%5Bprefix%5D=&custom_field%5Brequired%5D=0&custom_field%5Bmultiple%5D=0&custom_field%5Bmultiple%5D=1&custom_field%5Bbeauty_phone%5D=0`,
`utf8=%E2%9C%93&class_name=${modes[1][indexArray]}&custom_field%5Bname%5D=13.+%D0%A7%D0%B8%D1%81%D0%BB%D0%BE+++${getRand()}&type=number&custom_field%5Bcustom_field_category_id%5D=${tab}&custom_field%5Bextension_type%5D=without_extension&custom_field%5Bextension%5D=&custom_field%5Bextension%5D=&custom_field%5Brequired%5D=0&custom_field%5Bonly_integer%5D=0`,
`utf8=%E2%9C%93&class_name=${modes[1][indexArray]}&custom_field%5Bname%5D=14.+%D0%A7%D0%B8%D1%81%D0%BB%D0%BE+-+%D0%A6%D0%B5%D0%BB%D0%BE%D0%B5++${getRand()}&type=number&custom_field%5Bcustom_field_category_id%5D=${tab}&custom_field%5Bextension_type%5D=without_extension&custom_field%5Bextension%5D=&custom_field%5Bextension%5D=&custom_field%5Brequired%5D=0&custom_field%5Bonly_integer%5D=0&custom_field%5Bonly_integer%5D=1`,
`utf8=%E2%9C%93&class_name=${modes[1][indexArray]}&custom_field%5Bname%5D=15.+%D0%A7%D0%B8%D1%81%D0%BB%D0%BE+-+%D0%A1%D0%B2%D0%BE%D0%B5+%D0%B7%D0%BD.++++${getRand()}&type=number&custom_field%5Bcustom_field_category_id%5D=${tab}&custom_field%5Bextension_type%5D=unit&custom_field%5Bextension%5D=%D0%BB.&custom_field%5Brequired%5D=0&custom_field%5Bonly_integer%5D=0`,
`utf8=%E2%9C%93&class_name=${modes[1][indexArray]}&custom_field%5Bname%5D=16.+%D0%A7%D0%B8%D1%81%D0%BB%D0%BE+-+%D0%92%D0%B0%D0%BB%D1%8E%D1%82%D0%B0+(USD%2C+%24)++${getRand()}&type=number&custom_field%5Bcustom_field_category_id%5D=${tab}&custom_field%5Bextension_type%5D=currency&custom_field%5Bextension%5D=USD%2C+%24&custom_field%5Brequired%5D=0&custom_field%5Bonly_integer%5D=0`,
`utf8=%E2%9C%93&class_name=${modes[1][indexArray]}&custom_field%5Bname%5D=17.+%D0%A7%D0%B8%D1%81%D0%BB%D0%BE+-+%D0%92%D0%B0%D0%BB%D1%8E%D1%82%D0%B0+(%D0%91%D0%B0%D0%B7+%D0%B7%D0%BD%D0%B0%D0%BA%D0%B0)++${getRand()}&type=number&custom_field%5Bcustom_field_category_id%5D=${tab}&custom_field%5Bextension_type%5D=currency&custom_field%5Bextension%5D=%D0%91%D0%B5%D0%B7+%D0%B7%D0%BD%D0%B0%D0%BA%D0%B0&custom_field%5Brequired%5D=0&custom_field%5Bonly_integer%5D=0`,
`utf8=%E2%9C%93&class_name=${modes[1][indexArray]}&custom_field%5Bname%5D=18.+%D0%94%D0%B0%D1%82%D0%B0++${getRand()}&type=date&custom_field%5Bcustom_field_category_id%5D=${tab}&custom_field%5Brequired%5D=0&custom_field%5Bwith_time%5D=0&custom_field%5Bshow_diaries_in_timepicker%5D=0`,
`utf8=%E2%9C%93&class_name=${modes[1][indexArray]}&custom_field%5Bname%5D=19.+%D0%94%D0%B0%D1%82%D0%B0+%D0%B8+%D0%92%D1%80%D0%B5%D0%BC%D1%8F++${getRand()}&type=date&custom_field%5Bcustom_field_category_id%5D=${tab}&custom_field%5Brequired%5D=0&custom_field%5Bwith_time%5D=0&custom_field%5Bwith_time%5D=1&custom_field%5Bshow_diaries_in_timepicker%5D=0`,
`utf8=%E2%9C%93&class_name=${modes[1][indexArray]}&custom_field%5Bname%5D=20.+%D0%94%D0%B0%D1%82%D0%B0+%D0%B8+%D0%92%D1%80%D0%B5%D0%BC%D1%8F+%D0%B8+%D0%9A%D0%B0%D0%BB%D0%B5%D0%BD%D0%B4%D0%B0%D1%80%D1%8C+%D0%B7%D0%B0%D0%B4%D0%B0%D1%87++${getRand()}&type=date&custom_field%5Bcustom_field_category_id%5D=${tab}&custom_field%5Brequired%5D=0&custom_field%5Bwith_time%5D=0&custom_field%5Bwith_time%5D=1&custom_field%5Bshow_diaries_in_timepicker%5D=0&custom_field%5Bshow_diaries_in_timepicker%5D=1`,
`utf8=%E2%9C%93&class_name=${modes[1][indexArray]}&custom_field%5Bname%5D=21.+%D0%A1%D0%BF%D0%B8%D1%81%D0%BE%D0%BA+-+%D0%92%D1%8B%D0%BF%D0%B0%D0%B4%D0%B0%D1%8E%D1%89%D0%B8%D0%B9+(%D0%BE%D0%B4%D0%BD%D0%BE+%D0%B7%D0%BD%D0%B0%D1%87%D0%B5%D0%BD%D0%B8%D0%B5)++${getRand()}&type=select&custom_field%5Bcustom_field_category_id%5D=${tab}&custom_field%5Bdisplay_as%5D=select&custom_field%5Brequired%5D=0&custom_field%5Bmultiple%5D=0&custom_field%5Bcolors%5D%5B%5D=%2316b636&custom_field%5Boptions%5D%5B%5D=%D0%9E%D0%B4%D0%B8%D0%BD&custom_field%5Bvalues%5D%5B%5D=1&custom_field%5Bcolors%5D%5B%5D=%239e2e3f&custom_field%5Boptions%5D%5B%5D=%D0%94%D0%B2%D0%B0&custom_field%5Bvalues%5D%5B%5D=2&custom_field%5Bcolors%5D%5B%5D=%23b11b4d&custom_field%5Boptions%5D%5B%5D=%D0%A2%D1%80%D0%B8&custom_field%5Bvalues%5D%5B%5D=3`,
`utf8=%E2%9C%93&class_name=${modes[1][indexArray]}&custom_field%5Bname%5D=22.+%D0%A1%D0%BF%D0%B8%D1%81%D0%BE%D0%BA+-+%D0%92%D1%8B%D0%BF%D0%B0%D0%B4%D0%B0%D1%8E%D1%89%D0%B8%D0%B9+(%D0%BC%D0%BD.+%D0%B2%D1%8B%D0%B1%D0%BE%D1%80)++${getRand()}&type=select&custom_field%5Bcustom_field_category_id%5D=${tab}&custom_field%5Bdisplay_as%5D=select&custom_field%5Brequired%5D=0&custom_field%5Bmultiple%5D=0&custom_field%5Bmultiple%5D=1&custom_field%5Bcolors%5D%5B%5D=%231c93b0&custom_field%5Boptions%5D%5B%5D=%D0%9E%D0%B4%D0%B8%D0%BD&custom_field%5Bvalues%5D%5B%5D=1&custom_field%5Bcolors%5D%5B%5D=%23227faa&custom_field%5Boptions%5D%5B%5D=%D0%94%D0%B2%D0%B0&custom_field%5Bvalues%5D%5B%5D=2&custom_field%5Bcolors%5D%5B%5D=%23892ca0&custom_field%5Boptions%5D%5B%5D=%D0%A2%D1%80%D0%B8&custom_field%5Bvalues%5D%5B%5D=3`,
`utf8=%E2%9C%93&class_name=${modes[1][indexArray]}&custom_field%5Bname%5D=23.+%D0%A1%D0%BF%D0%B8%D1%81%D0%BE%D0%BA%20-%20%D0%A4%D0%BB%D0%B0%D0%B6%D0%BA%D0%B8%20%28%D0%BE%D0%B4%D0%BD%D0%BE%20%D0%B7%D0%BD%D0%B0%D1%87%D0%BD%D0%B8%D0%B5%29++${getRand()}&type=select&custom_field%5Bcustom_field_category_id%5D=${tab}&custom_field%5Bdisplay_as%5D=checkapp&custom_field%5Brequired%5D=0&custom_field%5Bmultiple%5D=0&custom_field%5Bmultiple%5D=0&custom_field%5Bcolors%5D%5B%5D=%23903c40&custom_field%5Boptions%5D%5B%5D=%D0%9E%D0%B4%D0%B8%D0%BD&custom_field%5Bvalues%5D%5B%5D=1&custom_field%5Bcolors%5D%5B%5D=%23928d3a&custom_field%5Boptions%5D%5B%5D=%D0%94%D0%B2%D0%B0&custom_field%5Bvalues%5D%5B%5D=2&custom_field%5Bcolors%5D%5B%5D=%2${tab}20ac&custom_field%5Boptions%5D%5B%5D=%D0%A2%D1%80%D0%B8&custom_field%5Bvalues%5D%5B%5D=3`,
`utf8=%E2%9C%93&class_name=${modes[1][indexArray]}&custom_field%5Bname%5D=24.+%D0%A1%D0%BF%D0%B8%D1%81%D0%BE%D0%BA+-+%D0%A4%D0%BB%D0%B0%D0%B6%D0%BA%D0%B8+(%D0%BC%D0%BD.+%D0%B2%D1%8B%D0%B1%D0%BE%D1%80)++${getRand()}&type=select&custom_field%5Bcustom_field_category_id%5D=${tab}&custom_field%5Bdisplay_as%5D=checkapp&custom_field%5Brequired%5D=0&custom_field%5Bmultiple%5D=0&custom_field%5Bmultiple%5D=1&custom_field%5Bcolors%5D%5B%5D=%23903c40&custom_field%5Boptions%5D%5B%5D=%D0%9E%D0%B4%D0%B8%D0%BD&custom_field%5Bvalues%5D%5B%5D=1&custom_field%5Bcolors%5D%5B%5D=%23928d3a&custom_field%5Boptions%5D%5B%5D=%D0%94%D0%B2%D0%B0&custom_field%5Bvalues%5D%5B%5D=2&custom_field%5Bcolors%5D%5B%5D=%2${tab}20ac&custom_field%5Boptions%5D%5B%5D=%D0%A2%D1%80%D0%B8&custom_field%5Bvalues%5D%5B%5D=3`,
`utf8=%E2%9C%93&class_name=${modes[1][indexArray]}&custom_field%5Bname%5D=25.+%D0%A1%D0%BF%D0%B8%D1%81%D0%BE%D0%BA+(%D0%B2%D0%BD%D0%B5%D1%88%D0%BD%D0%B8%D0%B9+%D0%B8%D1%81%D1%82%D0%BE%D1%87%D0%BD%D0%B8%D0%BA)+(%D0%BE%D0%B4%D0%BD%D0%BE+%D0%B7%D0%BD%D0%B0%D1%87.)++${getRand()}&type=external_select&custom_field%5Bcustom_field_category_id%5D=${tab}&custom_field%5Bmultiple%5D=0&custom_field%5Bexternal_source%5D=https%3A%2F%2Fsalesap.ru%2Fdemo-data%2Fdemo-field.json&custom_field%5Blabel_key%5D=name&custom_field%5Bvalue_key%5D=value&custom_field%5Bcolor_key%5D=&custom_field%5Bjson_path%5D=colors&custom_field%5Busername%5D=&custom_field%5Bpassword%5D=`,
`utf8=%E2%9C%93&class_name=${modes[1][indexArray]}&custom_field%5Bname%5D=26.+%D0%A1%D0%BF%D0%B8%D1%81%D0%BE%D0%BA+(%D0%B2%D0%BD%D0%B5%D1%88%D0%BD%D0%B8%D0%B9+%D0%B8%D1%81%D1%82%D0%BE%D1%87%D0%BD%D0%B8%D0%BA)+(%D0%BC%D0%BD.+%D0%B2%D1%8B%D0%B1%D0%BE%D1%80)++${getRand()}&type=external_select&custom_field%5Bcustom_field_category_id%5D=${tab}&custom_field%5Bmultiple%5D=0&custom_field%5Bmultiple%5D=1&custom_field%5Bexternal_source%5D=https%3A%2F%2Fsalesap.ru%2Fdemo-data%2Fdemo-field.json&custom_field%5Blabel_key%5D=name&custom_field%5Bvalue_key%5D=value&custom_field%5Bcolor_key%5D=&custom_field%5Bjson_path%5D=colors&custom_field%5Busername%5D=&custom_field%5Bpassword%5D=`,
`utf8=%E2%9C%93&class_name=${modes[1][indexArray]}&custom_field%5Bname%5D=27.+%D0%A4%D0%B0%D0%B9%D0%BB+(%D0%BD%D0%B5+%D0%BF%D1%83%D0%B1%D0%BB.)++${getRand()}&type=file&custom_field%5Bcustom_field_category_id%5D=${tab}&custom_field%5Bpublic_upload%5D=0`,
`utf8=%E2%9C%93&class_name=${modes[1][indexArray]}&custom_field%5Bname%5D=28.+%D0%A4%D0%B0%D0%B9%D0%BB+(%D0%BF%D1%83%D0%B1%D0%BB%D0%B8%D1%87%D0%BD%D1%8B%D0%B9)++${getRand()}&type=file&custom_field%5Bcustom_field_category_id%5D=${tab}&custom_field%5Bpublic_upload%5D=0&custom_field%5Bpublic_upload%5D=1`,
`utf8=%E2%9C%93&class_name=${modes[1][indexArray]}&custom_field%5Bname%5D=29.+%D0%A4%D0%BE%D1%80%D0%BC%D1%83%D0%BB%D0%B0++${getRand()}&type=formula&custom_field%5Bcustom_field_category_id%5D=${tab}&custom_field%5Bextension_type%5D=without_extension&custom_field%5Bextension%5D=&custom_field%5Bextension%5D=&custom_field%5Bformula%5D=%3Cp%3E100%2B100%3C%2Fp%3E`,
`utf8=%E2%9C%93&class_name=${modes[1][indexArray]}&custom_field%5Bname%5D=30.+%D0%A0%D0%B5%D0%B9%D1%82%D0%B8%D0%BD%D0%B3++${getRand()}&type=rating&custom_field%5Bcustom_field_category_id%5D=${tab}&custom_field%5Brequired%5D=0`,
`utf8=%E2%9C%93&class_name=${modes[1][indexArray]}&custom_field%5Bname%5D=31.+%D0%A1%D0%B2%D1%8F%D0%B7%D1%8C+-+%D0%97%D0%B0%D1%8F%D0%B2%D0%BA%D0%B8++${getRand()}&type=relation&custom_field%5Bcustom_field_category_id%5D=${tab}&custom_field%5Brelation_class%5D=Order`,
`utf8=%E2%9C%93&class_name=${modes[1][indexArray]}&custom_field%5Bname%5D=32.+%D0%A1%D0%B2%D1%8F%D0%B7%D1%8C+-+%D0%9A%D0%BE%D0%BC%D0%BF%D0%B0%D0%BD%D0%B8%D0%B8++${getRand()}&type=relation&custom_field%5Bcustom_field_category_id%5D=${tab}&custom_field%5Brelation_class%5D=Company`,
`utf8=%E2%9C%93&class_name=${modes[1][indexArray]}&custom_field%5Bname%5D=33.+%D0%A1%D0%B2%D1%8F%D0%B7%D1%8C+-+%D0%A1%D0%B4%D0%B5%D0%BB%D0%BA%D0%B8++${getRand()}&type=relation&custom_field%5Bcustom_field_category_id%5D=${tab}&custom_field%5Brelation_class%5D=Deal`,
`utf8=%E2%9C%93&class_name=${modes[1][indexArray]}&custom_field%5Bname%5D=34.+%D0%A1%D0%B2%D1%8F%D0%B7%D1%8C+-+%D0%9A%D0%BE%D0%BD%D1%82%D0%B0%D0%BA%D1%82%D1%8B++${getRand()}&type=relation&custom_field%5Bcustom_field_category_id%5D=${tab}&custom_field%5Brelation_class%5D=Contact`,
`utf8=%E2%9C%93&class_name=${modes[1][indexArray]}&custom_field%5Bname%5D=35.+%D0%A1%D0%B2%D1%8F%D0%B7%D1%8C+-+%D0%9F%D1%80%D0%BE%D0%B4%D1%83%D0%BA%D1%82%D1%8B++${getRand()}&type=relation&custom_field%5Bcustom_field_category_id%5D=${tab}&custom_field%5Brelation_class%5D=Product`,
`utf8=%E2%9C%93&class_name=${modes[1][indexArray]}&custom_field%5Bname%5D=36.+%D0%A1%D0%B2%D1%8F%D0%B7%D1%8C+-+%D0%A1%D0%BE%D1%82%D1%80%D1%83%D0%B4%D0%BD%D0%B8%D0%BA%D0%B8++${getRand()}&type=relation&custom_field%5Bcustom_field_category_id%5D=${tab}&custom_field%5Brelation_class%5D=User`,
`utf8=%E2%9C%93&class_name=${modes[1][indexArray]}&custom_field%5Bname%5D=37.+%D0%A1%D0%B2%D1%8F%D0%B7%D1%8C+-+%D0%97%D0%B0%D0%B4%D0%B0%D1%87%D0%B8++${getRand()}&type=relation&custom_field%5Bcustom_field_category_id%5D=${tab}&custom_field%5Brelation_class%5D=DiaryTask`,
`utf8=%E2%9C%93&class_name=${modes[1][indexArray]}&custom_field%5Bname%5D=38.+%D0%A1%D0%B2%D1%8F%D0%B7%D1%8C+-+%D0%A1%D0%BE%D0%B1%D1%8B%D1%82%D0%B8%D1%8F++${getRand()}&type=relation&custom_field%5Bcustom_field_category_id%5D=${tab}&custom_field%5Brelation_class%5D=DiaryEvent`,
`utf8=%E2%9C%93&class_name=${modes[1][indexArray]}&custom_field%5Bname%5D=39.+%D0%A1%D0%B2%D1%8F%D0%B7%D1%8C+-+%D0%97%D0%B0%D0%BF%D0%B8%D1%81%D0%B8++${getRand()}&type=relation&custom_field%5Bcustom_field_category_id%5D=${tab}&custom_field%5Brelation_class%5D=Entry`,
`utf8=%E2%9C%93&class_name=${modes[1][indexArray]}&custom_field%5Bname%5D=40.+%D0%A1%D0%B2%D1%8F%D0%B7%D1%8C+-+%D0%94%D0%BE%D0%BA%D1%83%D0%BC%D0%B5%D0%BD%D1%82%D1%8B++${getRand()}&type=relation&custom_field%5Bcustom_field_category_id%5D=${tab}&custom_field%5Brelation_class%5D=DocumentTemplateRender`,
`utf8=%E2%9C%93&class_name=${modes[1][indexArray]}&custom_field%5Bname%5D=41.+%D0%A1%D0%B2%D1%8F%D0%B7%D1%8C+-+%D0%94%D0%BE%D0%B3%D0%BE%D0%B2%D0%BE%D1%80%D1%8B++${getRand()}&type=relation&custom_field%5Bcustom_field_category_id%5D=${tab}&custom_field%5Brelation_class%5D=Contract`,
`utf8=%E2%9C%93&class_name=${modes[1][indexArray]}&custom_field%5Bname%5D=42.+%D0%A1%D0%B2%D1%8F%D0%B7%D1%8C+-+%D0%92%D0%B8%D0%B7%D0%B8%D1%82%D1%8B++${getRand()}&type=relation&custom_field%5Bcustom_field_category_id%5D=${tab}&custom_field%5Brelation_class%5D=Checkup`,
`utf8=%E2%9C%93&class_name=${modes[1][indexArray]}&custom_field%5Bname%5D=43.+%D0%BC%D0%BD.+%D0%A1%D0%B2%D1%8F%D0%B7%D1%8C+-+%D0%9A%D0%BE%D0%BC%D0%BF%D0%B0%D0%BD%D0%B8%D0%B8++${getRand()}&type=multiple_relation&custom_field%5Bcustom_field_category_id%5D=${tab}&custom_field%5Brelation_class%5D=Company&custom_field%5Bread_all%5D=0`,
`utf8=%E2%9C%93&class_name=${modes[1][indexArray]}&custom_field%5Bname%5D=44.+%D0%BC%D0%BD.+%D0%A1%D0%B2%D1%8F%D0%B7%D1%8C+-+%D0%A1%D0%B4%D0%B5%D0%BB%D0%BA%D0%B8++${getRand()}&type=multiple_relation&custom_field%5Bcustom_field_category_id%5D=${tab}&custom_field%5Brelation_class%5D=Deal&custom_field%5Bread_all%5D=0`,
`utf8=%E2%9C%93&class_name=${modes[1][indexArray]}&custom_field%5Bname%5D=45.+%D0%BC%D0%BD.+%D0%A1%D0%B2%D1%8F%D0%B7%D1%8C+-+%D0%97%D0%B0%D1%8F%D0%B2%D0%BA%D0%B8++${getRand()}&type=multiple_relation&custom_field%5Bcustom_field_category_id%5D=${tab}&custom_field%5Brelation_class%5D=Order&custom_field%5Bread_all%5D=0`,
`utf8=%E2%9C%93&class_name=${modes[1][indexArray]}&custom_field%5Bname%5D=46.+%D0%BC%D0%BD.+%D0%A1%D0%B2%D1%8F%D0%B7%D1%8C+-+%D0%9A%D0%BE%D0%BD%D1%82%D0%B0%D0%BA%D1%82%D1%8B++${getRand()}&type=multiple_relation&custom_field%5Bcustom_field_category_id%5D=${tab}&custom_field%5Brelation_class%5D=Contact&custom_field%5Bread_all%5D=0`,
`utf8=%E2%9C%93&class_name=${modes[1][indexArray]}&custom_field%5Bname%5D=47.+%D0%BC%D0%BD.+%D0%A1%D0%B2%D1%8F%D0%B7%D1%8C+-+%D0%9F%D1%80%D0%BE%D0%B4%D1%83%D0%BA%D1%82%D1%8B++${getRand()}&type=multiple_relation&custom_field%5Bcustom_field_category_id%5D=${tab}&custom_field%5Brelation_class%5D=Product&custom_field%5Bread_all%5D=0`,
`utf8=%E2%9C%93&class_name=${modes[1][indexArray]}&custom_field%5Bname%5D=48.+%D0%BC%D0%BD.+%D0%A1%D0%B2%D1%8F%D0%B7%D1%8C+-+%D0%A1%D0%BE%D1%82%D1%80%D1%83%D0%B4%D0%BD%D0%B8%D0%BA%D0%B8++${getRand()}&type=multiple_relation&custom_field%5Bcustom_field_category_id%5D=${tab}&custom_field%5Brelation_class%5D=User&custom_field%5Bread_all%5D=0`,
`utf8=%E2%9C%93&class_name=${modes[1][indexArray]}&custom_field%5Bname%5D=49.+%D0%BC%D0%BD.+%D0%A1%D0%B2%D1%8F%D0%B7%D1%8C+-+%D0%97%D0%B0%D0%B4%D0%B0%D1%87%D0%B8++${getRand()}&type=multiple_relation&custom_field%5Bcustom_field_category_id%5D=${tab}&custom_field%5Brelation_class%5D=DiaryTask&custom_field%5Bread_all%5D=0`,
`utf8=%E2%9C%93&class_name=${modes[1][indexArray]}&custom_field%5Bname%5D=50.+%D0%BC%D0%BD.+%D0%A1%D0%B2%D1%8F%D0%B7%D1%8C+-+%D0%A1%D0%BE%D0%B1%D1%8B%D1%82%D0%B8%D1%8F++${getRand()}&type=multiple_relation&custom_field%5Bcustom_field_category_id%5D=${tab}&custom_field%5Brelation_class%5D=DiaryEvent&custom_field%5Bread_all%5D=0`,
`utf8=%E2%9C%93&class_name=${modes[1][indexArray]}&custom_field%5Bname%5D=51.+%D0%BC%D0%BD.+%D0%A1%D0%B2%D1%8F%D0%B7%D1%8C+-+%D0%97%D0%B0%D0%BF%D0%B8%D1%81%D0%B8++${getRand()}&type=multiple_relation&custom_field%5Bcustom_field_category_id%5D=${tab}&custom_field%5Brelation_class%5D=Entry&custom_field%5Bread_all%5D=0`,
`utf8=%E2%9C%93&class_name=${modes[1][indexArray]}&custom_field%5Bname%5D=52.+%D0%BC%D0%BD.+%D0%A1%D0%B2%D1%8F%D0%B7%D1%8C+-+%D0%94%D0%BE%D0%BA%D1%83%D0%BC%D0%B5%D0%BD%D1%82%D1%8B++${getRand()}&type=multiple_relation&custom_field%5Bcustom_field_category_id%5D=${tab}&custom_field%5Brelation_class%5D=DocumentTemplateRender&custom_field%5Bread_all%5D=0`,
`utf8=%E2%9C%93&class_name=${modes[1][indexArray]}&custom_field%5Bname%5D=53.+%D0%BC%D0%BD.+%D0%A1%D0%B2%D1%8F%D0%B7%D1%8C+-+%D0%94%D0%BE%D0%B3%D0%BE%D0%B2%D0%BE%D1%80%D1%8B++${getRand()}&type=multiple_relation&custom_field%5Bcustom_field_category_id%5D=${tab}&custom_field%5Brelation_class%5D=Contract&custom_field%5Bread_all%5D=0`,
`utf8=%E2%9C%93&class_name=${modes[1][indexArray]}&custom_field%5Bname%5D=54.+%D0%BC%D0%BD.+%D0%A1%D0%B2%D1%8F%D0%B7%D1%8C+-+%D0%9A%D0%BE%D0%BC%D0%BF%D0%B0%D0%BD%D0%B8%D0%B8%20%28%D1%87%D1%82.%20%D0%B2%D1%81%D0%B5%D0%B3%D0%BE%20%D1%81%D0%BF%D0%B8%D1%81%D0%BA%D0%B0%29++${getRand()}&type=multiple_relation&custom_field%5Bcustom_field_category_id%5D=${tab}&custom_field%5Brelation_class%5D=Company&custom_field%5Bread_all%5D=1`,
`utf8=%E2%9C%93&class_name=${modes[1][indexArray]}&custom_field%5Bname%5D=55.+%D0%BC%D0%BD.+%D0%A1%D0%B2%D1%8F%D0%B7%D1%8C+-+%D0%A1%D0%B4%D0%B5%D0%BB%D0%BA%D0%B8%20%28%D1%87%D1%82.%20%D0%B2%D1%81%D0%B5%D0%B3%D0%BE%20%D1%81%D0%BF%D0%B8%D1%81%D0%BA%D0%B0%29++${getRand()}&type=multiple_relation&custom_field%5Bcustom_field_category_id%5D=${tab}&custom_field%5Brelation_class%5D=Deal&custom_field%5Bread_all%5D=1`,
`utf8=%E2%9C%93&class_name=${modes[1][indexArray]}&custom_field%5Bname%5D=56.+%D0%BC%D0%BD.+%D0%A1%D0%B2%D1%8F%D0%B7%D1%8C+-+%D0%97%D0%B0%D1%8F%D0%B2%D0%BA%D0%B8%20%28%D1%87%D1%82.%20%D0%B2%D1%81%D0%B5%D0%B3%D0%BE%20%D1%81%D0%BF%D0%B8%D1%81%D0%BA%D0%B0%29++${getRand()}&type=multiple_relation&custom_field%5Bcustom_field_category_id%5D=${tab}&custom_field%5Brelation_class%5D=Order&custom_field%5Bread_all%5D=1`,
`utf8=%E2%9C%93&class_name=${modes[1][indexArray]}&custom_field%5Bname%5D=57.+%D0%BC%D0%BD.+%D0%A1%D0%B2%D1%8F%D0%B7%D1%8C+-+%D0%9A%D0%BE%D0%BD%D1%82%D0%B0%D0%BA%D1%82%D1%8B%20%28%D1%87%D1%82.%20%D0%B2%D1%81%D0%B5%D0%B3%D0%BE%20%D1%81%D0%BF%D0%B8%D1%81%D0%BA%D0%B0%29++${getRand()}&type=multiple_relation&custom_field%5Bcustom_field_category_id%5D=${tab}&custom_field%5Brelation_class%5D=Contact&custom_field%5Bread_all%5D=1`,
`utf8=%E2%9C%93&class_name=${modes[1][indexArray]}&custom_field%5Bname%5D=58.+%D0%BC%D0%BD.+%D0%A1%D0%B2%D1%8F%D0%B7%D1%8C+-+%D0%9F%D1%80%D0%BE%D0%B4%D1%83%D0%BA%D1%82%D1%8B%20%28%D1%87%D1%82.%20%D0%B2%D1%81%D0%B5%D0%B3%D0%BE%20%D1%81%D0%BF%D0%B8%D1%81%D0%BA%D0%B0%29++${getRand()}&type=multiple_relation&custom_field%5Bcustom_field_category_id%5D=${tab}&custom_field%5Brelation_class%5D=Product&custom_field%5Bread_all%5D=1`,
`utf8=%E2%9C%93&class_name=${modes[1][indexArray]}&custom_field%5Bname%5D=59.+%D0%BC%D0%BD.+%D0%A1%D0%B2%D1%8F%D0%B7%D1%8C+-+%D0%A1%D0%BE%D1%82%D1%80%D1%83%D0%B4%D0%BD%D0%B8%D0%BA%D0%B8%20%28%D1%87%D1%82.%20%D0%B2%D1%81%D0%B5%D0%B3%D0%BE%20%D1%81%D0%BF%D0%B8%D1%81%D0%BA%D0%B0%29++${getRand()}&type=multiple_relation&custom_field%5Bcustom_field_category_id%5D=${tab}&custom_field%5Brelation_class%5D=User&custom_field%5Bread_all%5D=1`,
`utf8=%E2%9C%93&class_name=${modes[1][indexArray]}&custom_field%5Bname%5D=60.+%D0%BC%D0%BD.+%D0%A1%D0%B2%D1%8F%D0%B7%D1%8C+-+%D0%97%D0%B0%D0%B4%D0%B0%D1%87%D0%B8%20%28%D1%87%D1%82.%20%D0%B2%D1%81%D0%B5%D0%B3%D0%BE%20%D1%81%D0%BF%D0%B8%D1%81%D0%BA%D0%B0%29++${getRand()}&type=multiple_relation&custom_field%5Bcustom_field_category_id%5D=${tab}&custom_field%5Brelation_class%5D=DiaryTask&custom_field%5Bread_all%5D=1`,
`utf8=%E2%9C%93&class_name=${modes[1][indexArray]}&custom_field%5Bname%5D=61.+%D0%BC%D0%BD.+%D0%A1%D0%B2%D1%8F%D0%B7%D1%8C+-+%D0%A1%D0%BE%D0%B1%D1%8B%D1%82%D0%B8%D1%8F%20%28%D1%87%D1%82.%20%D0%B2%D1%81%D0%B5%D0%B3%D0%BE%20%D1%81%D0%BF%D0%B8%D1%81%D0%BA%D0%B0%29++${getRand()}&type=multiple_relation&custom_field%5Bcustom_field_category_id%5D=${tab}&custom_field%5Brelation_class%5D=DiaryEvent&custom_field%5Bread_all%5D=1`,
`utf8=%E2%9C%93&class_name=${modes[1][indexArray]}&custom_field%5Bname%5D=62.+%D0%BC%D0%BD.+%D0%A1%D0%B2%D1%8F%D0%B7%D1%8C+-+%D0%97%D0%B0%D0%BF%D0%B8%D1%81%D0%B8%20%28%D1%87%D1%82.%20%D0%B2%D1%81%D0%B5%D0%B3%D0%BE%20%D1%81%D0%BF%D0%B8%D1%81%D0%BA%D0%B0%29++${getRand()}&type=multiple_relation&custom_field%5Bcustom_field_category_id%5D=${tab}&custom_field%5Brelation_class%5D=Entry&custom_field%5Bread_all%5D=1`,
`utf8=%E2%9C%93&class_name=${modes[1][indexArray]}&custom_field%5Bname%5D=63.+%D0%BC%D0%BD.+%D0%A1%D0%B2%D1%8F%D0%B7%D1%8C+-+%D0%94%D0%BE%D0%BA%D1%83%D0%BC%D0%B5%D0%BD%D1%82%D1%8B%20%28%D1%87%D1%82.%20%D0%B2%D1%81%D0%B5%D0%B3%D0%BE%20%D1%81%D0%BF%D0%B8%D1%81%D0%BA%D0%B0%29++${getRand()}&type=multiple_relation&custom_field%5Bcustom_field_category_id%5D=${tab}&custom_field%5Brelation_class%5D=DocumentTemplateRender&custom_field%5Bread_all%5D=1`,
`utf8=%E2%9C%93&class_name=${modes[1][indexArray]}&custom_field%5Bname%5D=64.+%D0%BC%D0%BD.+%D0%A1%D0%B2%D1%8F%D0%B7%D1%8C+-+%D0%94%D0%BE%D0%B3%D0%BE%D0%B2%D0%BE%D1%80%D1%8B%20%28%D1%87%D1%82.%20%D0%B2%D1%81%D0%B5%D0%B3%D0%BE%20%D1%81%D0%BF%D0%B8%D1%81%D0%BA%D0%B0%29++${getRand()}&type=multiple_relation&custom_field%5Bcustom_field_category_id%5D=${tab}&custom_field%5Brelation_class%5D=Contract&custom_field%5Bread_all%5D=1`,
`utf8=%E2%9C%93&class_name=${modes[1][indexArray]}&custom_field%5Bname%5D=65.+%D0%A0%D0%B0%D1%81%D1%87%D0%B5%D1%82%D0%BD%D1%8B%D0%B9+%D1%81%D0%BF%D0%B8%D1%81%D0%BE%D0%BA++${getRand()}&type=weight&custom_field%5Bcustom_field_category_id%5D=${tab}&custom_field%5Bdisplay_as%5D=select&custom_field%5Brequired%5D=0&custom_field%5Bmultiple%5D=0&custom_field%5Boptions_attributes%5D%5B1660560888987%5D%5Bname%5D=%D0%9E%D0%B4%D0%B8%D0%BD&custom_field%5Boptions_attributes%5D%5B1660560888987%5D%5Bweight%5D=1&custom_field%5Boptions_attributes%5D%5B1660560889778%5D%5Bname%5D=%D0%94%D0%B2%D0%B0&custom_field%5Boptions_attributes%5D%5B1660560889778%5D%5Bweight%5D=2&custom_field%5Boptions_attributes%5D%5B1660560890134%5D%5Bname%5D=%D0%A2%D1%80%D0%B8&custom_field%5Boptions_attributes%5D%5B1660560890134%5D%5Bweight%5D=3&custom_field%5Boptions_attributes%5D%5B1660560901712%5D%5Bname%5D=%D0%9C%D0%B8%D0%BD%D1%83%D1%81+3&custom_field%5Boptions_attributes%5D%5B1660560901712%5D%5Bweight%5D=-3&custom_field%5Boptions_attributes%5D%5B1660560907640%5D%5Bname%5D=1.5&custom_field%5Boptions_attributes%5D%5B1660560907640%5D%5Bweight%5D=1.5`,
`utf8=%E2%9C%93&class_name=${modes[1][indexArray]}&custom_field%5Bname%5D=66.+%D0%BC%D0%BD.+%D0%A0%D0%B0%D1%81%D1%87%D0%B5%D1%82%D0%BD%D1%8B%D0%B9+%D1%81%D0%BF%D0%B8%D1%81%D0%BE%D0%BA++${getRand()}&type=weight&custom_field%5Bcustom_field_category_id%5D=${tab}&custom_field%5Bdisplay_as%5D=select&custom_field%5Brequired%5D=0&custom_field%5Bmultiple%5D=0&custom_field%5Bmultiple%5D=1&custom_field%5Boptions_attributes%5D%5B1660560964929%5D%5Bname%5D=%D0%9E%D0%B4%D0%B8%D0%BD&custom_field%5Boptions_attributes%5D%5B1660560964929%5D%5Bweight%5D=1&custom_field%5Boptions_attributes%5D%5B1660560965076%5D%5Bname%5D=%D0%94%D0%B2%D0%B0&custom_field%5Boptions_attributes%5D%5B1660560965076%5D%5Bweight%5D=2&custom_field%5Boptions_attributes%5D%5B1660560965223%5D%5Bname%5D=%D0%A2%D1%80%D0%B8&custom_field%5Boptions_attributes%5D%5B1660560965223%5D%5Bweight%5D=3&custom_field%5Boptions_attributes%5D%5B1660560965366%5D%5Bname%5D=%D0%9C%D0%B8%D0%BD%D1%83%D1%81+%D1%82%D1%80%D0%B8&custom_field%5Boptions_attributes%5D%5B1660560965366%5D%5Bweight%5D=-3&custom_field%5Boptions_attributes%5D%5B1660560972256%5D%5Bname%5D=1%2C5&custom_field%5Boptions_attributes%5D%5B1660560972256%5D%5Bweight%5D=1.5`,
`utf8=%E2%9C%93&class_name=${modes[1][indexArray]}&custom_field%5Bname%5D=67.+%D0%94%D0%B5%D1%80%D0%B5%D0%B2%D0%BE++${getRand()}&type=tree&custom_field%5Bcustom_field_category_id%5D=${tab}&custom_field%5Brequired%5D=0&custom_field%5Bmultiple%5D=0&custom_field%5Boptions_json%5D=%5B%7B%22id%22%3A%22j1_1%22%2C%22text%22%3A%22Step+1%22%2C%22icon%22%3Atrue%2C%22li_attr%22%3A%7B%22id%22%3A%22j1_1%22%7D%2C%22a_attr%22%3A%7B%22href%22%3A%22%23%22%2C%22id%22%3A%22j1_1_anchor%22%7D%2C%22state%22%3A%7B%22loaded%22%3Atrue%2C%22opened%22%3Atrue%2C%22selected%22%3Afalse%2C%22disabled%22%3Afalse%7D%2C%22data%22%3A%7B%7D%2C%22children%22%3A%5B%7B%22id%22%3A%22j1_3%22%2C%22text%22%3A%22Step+1.1%22%2C%22icon%22%3Atrue%2C%22li_attr%22%3A%7B%22id%22%3A%22j1_3%22%7D%2C%22a_attr%22%3A%7B%22href%22%3A%22%23%22%2C%22id%22%3A%22j1_3_anchor%22%7D%2C%22state%22%3A%7B%22loaded%22%3Atrue%2C%22opened%22%3Afalse%2C%22selected%22%3Afalse%2C%22disabled%22%3Afalse%7D%2C%22data%22%3A%7B%7D%2C%22children%22%3A%5B%5D%7D%5D%7D%2C%7B%22id%22%3A%22j1_2%22%2C%22text%22%3A%22Step+2%22%2C%22icon%22%3Atrue%2C%22li_attr%22%3A%7B%22id%22%3A%22j1_2%22%7D%2C%22a_attr%22%3A%7B%22href%22%3A%22%23%22%2C%22id%22%3A%22j1_2_anchor%22%7D%2C%22state%22%3A%7B%22loaded%22%3Atrue%2C%22opened%22%3Atrue%2C%22selected%22%3Afalse%2C%22disabled%22%3Afalse%7D%2C%22data%22%3A%7B%7D%2C%22children%22%3A%5B%7B%22id%22%3A%22j1_4%22%2C%22text%22%3A%22Step+2.1%22%2C%22icon%22%3Atrue%2C%22li_attr%22%3A%7B%22id%22%3A%22j1_4%22%7D%2C%22a_attr%22%3A%7B%22href%22%3A%22%23%22%2C%22id%22%3A%22j1_4_anchor%22%7D%2C%22state%22%3A%7B%22loaded%22%3Atrue%2C%22opened%22%3Afalse%2C%22selected%22%3Afalse%2C%22disabled%22%3Afalse%7D%2C%22data%22%3A%7B%7D%2C%22children%22%3A%5B%5D%7D%2C%7B%22id%22%3A%22j1_5%22%2C%22text%22%3A%22Step+2.2%22%2C%22icon%22%3Atrue%2C%22li_attr%22%3A%7B%22id%22%3A%22j1_5%22%7D%2C%22a_attr%22%3A%7B%22href%22%3A%22%23%22%2C%22id%22%3A%22j1_5_anchor%22%7D%2C%22state%22%3A%7B%22loaded%22%3Atrue%2C%22opened%22%3Atrue%2C%22selected%22%3Afalse%2C%22disabled%22%3Afalse%7D%2C%22data%22%3A%7B%7D%2C%22children%22%3A%5B%5D%7D%2C%7B%22id%22%3A%22j1_7%22%2C%22text%22%3A%22Step+2.3%22%2C%22icon%22%3Atrue%2C%22li_attr%22%3A%7B%22id%22%3A%22j1_7%22%7D%2C%22a_attr%22%3A%7B%22href%22%3A%22%23%22%2C%22id%22%3A%22j1_7_anchor%22%7D%2C%22state%22%3A%7B%22loaded%22%3Atrue%2C%22opened%22%3Atrue%2C%22selected%22%3Afalse%2C%22disabled%22%3Afalse%7D%2C%22data%22%3A%7B%7D%2C%22children%22%3A%5B%7B%22id%22%3A%22j1_8%22%2C%22text%22%3A%22Step+2.3.1%22%2C%22icon%22%3Atrue%2C%22li_attr%22%3A%7B%22id%22%3A%22j1_8%22%7D%2C%22a_attr%22%3A%7B%22href%22%3A%22%23%22%2C%22id%22%3A%22j1_8_anchor%22%7D%2C%22state%22%3A%7B%22loaded%22%3Atrue%2C%22opened%22%3Afalse%2C%22selected%22%3Afalse%2C%22disabled%22%3Afalse%7D%2C%22data%22%3A%7B%7D%2C%22children%22%3A%5B%5D%7D%2C%7B%22id%22%3A%22j1_10%22%2C%22text%22%3A%22Step+2.3.2%22%2C%22icon%22%3Atrue%2C%22li_attr%22%3A%7B%22id%22%3A%22j1_10%22%7D%2C%22a_attr%22%3A%7B%22href%22%3A%22%23%22%2C%22id%22%3A%22j1_10_anchor%22%7D%2C%22state%22%3A%7B%22loaded%22%3Atrue%2C%22opened%22%3Afalse%2C%22selected%22%3Afalse%2C%22disabled%22%3Afalse%7D%2C%22data%22%3A%7B%7D%2C%22children%22%3A%5B%5D%7D%5D%7D%5D%7D%2C%7B%22id%22%3A%22j1_11%22%2C%22text%22%3A%22Step+3%22%2C%22icon%22%3Atrue%2C%22li_attr%22%3A%7B%22id%22%3A%22j1_11%22%7D%2C%22a_attr%22%3A%7B%22href%22%3A%22%23%22%2C%22id%22%3A%22j1_11_anchor%22%7D%2C%22state%22%3A%7B%22loaded%22%3Atrue%2C%22opened%22%3Afalse%2C%22selected%22%3Afalse%2C%22disabled%22%3Afalse%7D%2C%22data%22%3A%7B%7D%2C%22children%22%3A%5B%5D%7D%5D`,
`utf8=%E2%9C%93&class_name=${modes[1][indexArray]}&custom_field%5Bname%5D=68.+%20%28%D0%BC%D0%BD.%29%20%D0%94%D0%B5%D1%80%D0%B5%D0%B2%D0%BE++${getRand()}&type=tree&custom_field%5Bcustom_field_category_id%5D=${tab}&custom_field%5Brequired%5D=0&custom_field%5Bmultiple%5D=1&custom_field%5Boptions_json%5D=%5B%7B%22id%22%3A%22j1_1%22%2C%22text%22%3A%22Step+1%22%2C%22icon%22%3Atrue%2C%22li_attr%22%3A%7B%22id%22%3A%22j1_1%22%7D%2C%22a_attr%22%3A%7B%22href%22%3A%22%23%22%2C%22id%22%3A%22j1_1_anchor%22%7D%2C%22state%22%3A%7B%22loaded%22%3Atrue%2C%22opened%22%3Atrue%2C%22selected%22%3Afalse%2C%22disabled%22%3Afalse%7D%2C%22data%22%3A%7B%7D%2C%22children%22%3A%5B%7B%22id%22%3A%22j1_3%22%2C%22text%22%3A%22Step+1.1%22%2C%22icon%22%3Atrue%2C%22li_attr%22%3A%7B%22id%22%3A%22j1_3%22%7D%2C%22a_attr%22%3A%7B%22href%22%3A%22%23%22%2C%22id%22%3A%22j1_3_anchor%22%7D%2C%22state%22%3A%7B%22loaded%22%3Atrue%2C%22opened%22%3Afalse%2C%22selected%22%3Afalse%2C%22disabled%22%3Afalse%7D%2C%22data%22%3A%7B%7D%2C%22children%22%3A%5B%5D%7D%5D%7D%2C%7B%22id%22%3A%22j1_2%22%2C%22text%22%3A%22Step+2%22%2C%22icon%22%3Atrue%2C%22li_attr%22%3A%7B%22id%22%3A%22j1_2%22%7D%2C%22a_attr%22%3A%7B%22href%22%3A%22%23%22%2C%22id%22%3A%22j1_2_anchor%22%7D%2C%22state%22%3A%7B%22loaded%22%3Atrue%2C%22opened%22%3Atrue%2C%22selected%22%3Afalse%2C%22disabled%22%3Afalse%7D%2C%22data%22%3A%7B%7D%2C%22children%22%3A%5B%7B%22id%22%3A%22j1_4%22%2C%22text%22%3A%22Step+2.1%22%2C%22icon%22%3Atrue%2C%22li_attr%22%3A%7B%22id%22%3A%22j1_4%22%7D%2C%22a_attr%22%3A%7B%22href%22%3A%22%23%22%2C%22id%22%3A%22j1_4_anchor%22%7D%2C%22state%22%3A%7B%22loaded%22%3Atrue%2C%22opened%22%3Afalse%2C%22selected%22%3Afalse%2C%22disabled%22%3Afalse%7D%2C%22data%22%3A%7B%7D%2C%22children%22%3A%5B%5D%7D%2C%7B%22id%22%3A%22j1_5%22%2C%22text%22%3A%22Step+2.2%22%2C%22icon%22%3Atrue%2C%22li_attr%22%3A%7B%22id%22%3A%22j1_5%22%7D%2C%22a_attr%22%3A%7B%22href%22%3A%22%23%22%2C%22id%22%3A%22j1_5_anchor%22%7D%2C%22state%22%3A%7B%22loaded%22%3Atrue%2C%22opened%22%3Atrue%2C%22selected%22%3Afalse%2C%22disabled%22%3Afalse%7D%2C%22data%22%3A%7B%7D%2C%22children%22%3A%5B%5D%7D%2C%7B%22id%22%3A%22j1_7%22%2C%22text%22%3A%22Step+2.3%22%2C%22icon%22%3Atrue%2C%22li_attr%22%3A%7B%22id%22%3A%22j1_7%22%7D%2C%22a_attr%22%3A%7B%22href%22%3A%22%23%22%2C%22id%22%3A%22j1_7_anchor%22%7D%2C%22state%22%3A%7B%22loaded%22%3Atrue%2C%22opened%22%3Atrue%2C%22selected%22%3Afalse%2C%22disabled%22%3Afalse%7D%2C%22data%22%3A%7B%7D%2C%22children%22%3A%5B%7B%22id%22%3A%22j1_8%22%2C%22text%22%3A%22Step+2.3.1%22%2C%22icon%22%3Atrue%2C%22li_attr%22%3A%7B%22id%22%3A%22j1_8%22%7D%2C%22a_attr%22%3A%7B%22href%22%3A%22%23%22%2C%22id%22%3A%22j1_8_anchor%22%7D%2C%22state%22%3A%7B%22loaded%22%3Atrue%2C%22opened%22%3Afalse%2C%22selected%22%3Afalse%2C%22disabled%22%3Afalse%7D%2C%22data%22%3A%7B%7D%2C%22children%22%3A%5B%5D%7D%2C%7B%22id%22%3A%22j1_10%22%2C%22text%22%3A%22Step+2.3.2%22%2C%22icon%22%3Atrue%2C%22li_attr%22%3A%7B%22id%22%3A%22j1_10%22%7D%2C%22a_attr%22%3A%7B%22href%22%3A%22%23%22%2C%22id%22%3A%22j1_10_anchor%22%7D%2C%22state%22%3A%7B%22loaded%22%3Atrue%2C%22opened%22%3Afalse%2C%22selected%22%3Afalse%2C%22disabled%22%3Afalse%7D%2C%22data%22%3A%7B%7D%2C%22children%22%3A%5B%5D%7D%5D%7D%5D%7D%2C%7B%22id%22%3A%22j1_11%22%2C%22text%22%3A%22Step+3%22%2C%22icon%22%3Atrue%2C%22li_attr%22%3A%7B%22id%22%3A%22j1_11%22%7D%2C%22a_attr%22%3A%7B%22href%22%3A%22%23%22%2C%22id%22%3A%22j1_11_anchor%22%7D%2C%22state%22%3A%7B%22loaded%22%3Atrue%2C%22opened%22%3Afalse%2C%22selected%22%3Afalse%2C%22disabled%22%3Afalse%7D%2C%22data%22%3A%7B%7D%2C%22children%22%3A%5B%5D%7D%5D`,
`utf8=%E2%9C%93&class_name=${modes[1][indexArray]}&custom_field%5Bname%5D=69.+%D0%9A%D1%83%D1%80%D1%81+%D0%B2%D0%B0%D0%BB%D1%8E%D1%82%D1%8B+(USD)++${getRand()}&type=exchange_rate&custom_field%5Bcustom_field_category_id%5D=${tab}&custom_field%5Bcurrency%5D=11`,
`utf8=%E2%9C%93&class_name=${modes[1][indexArray]}&custom_field%5Bname%5D=70.+%D0%9A%D1%83%D1%80%D1%81+%D0%B2%D0%B0%D0%BB%D1%8E%D1%82%D1%8B+(EUR)++${getRand()}&type=exchange_rate&custom_field%5Bcustom_field_category_id%5D=${tab}&custom_field%5Bcurrency%5D=12`,
`utf8=%E2%9C%93&class_name=${modes[1][indexArray]}&custom_field%5Bname%5D=71.+%D0%9D%D1%83%D0%BC%D0%B5%D1%80%D0%B0%D1%82%D0%BE%D1%80+(%D0%B8%D0%BD%D0%BA%D1%80%D0%B5%D0%BC%D0%B5%D0%BD%D1%82)++${getRand()}&type=sequence&custom_field%5Bcustom_field_category_id%5D=${tab}&custom_field%5Bstart_number%5D=1&custom_field%5Bmask%5D=&custom_field%5Bsequence_group%5D=default&custom_field%5Bauto_sequence%5D=0&custom_field%5Bauto_sequence%5D=1`,
`utf8=%E2%9C%93&class_name=${modes[1][indexArray]}&custom_field%5Bname%5D=72.+%D0%9D%D1%83%D0%BC%D0%B5%D1%80%D0%B0%D1%82%D0%BE%D1%80+(%D0%B8%D0%BD%D0%BA%D1%80%D0%B5%D0%BC%D0%B5%D0%BD%D1%82+%2B+%D1%88%D0%B0%D0%B1%D0%BB%D0%BE%D0%BD)++${getRand()}&type=sequence&custom_field%5Bcustom_field_category_id%5D=${tab}&custom_field%5Bstart_number%5D=1&custom_field%5Bmask%5D=2019-%D0%94-%7B99999%7D&custom_field%5Bsequence_group%5D=default&custom_field%5Bauto_sequence%5D=0&custom_field%5Bauto_sequence%5D=1`] };

$('body').on('click','#addFields', async function(){

	if (tab == undefined) {alert("Не смог определить категорию, проверьте чтобы была активная категория"); return}
	let prom = prompt('Введите "all" (чтобы создать все доступные поля)')
	if (prom == 'all') {
		alert('Отправляются запросы, дождитесь пожалуйста, пока будут созданы все 72 поля')
		for (let i = 0; i < bodyFields(modes,indexArray,tab).length; i++) {
			await fetch('https://'+uriMain+"/settings/custom_fields", {
			  "headers": {
			    "accept": "*/*;q=0.5, text/javascript, application/javascript, application/ecmascript, application/x-ecmascript",
			    "accept-language": "ru",
			    "content-type": "application/x-www-form-urlencoded; charset=UTF-8",
			    "sec-ch-ua": "\"Google Chrome\";v=\"105\", \"Not)A;Brand\";v=\"8\", \"Chromium\";v=\"105\"",
			    "sec-ch-ua-mobile": "?0",
			    "sec-ch-ua-platform": "\"Windows\"",
			    "sec-fetch-dest": "empty",
			    "sec-fetch-mode": "cors",
			    "sec-fetch-site": "same-origin",
			    "x-csrf-token": `${crf}`,
			    "x-requested-with": "XMLHttpRequest"
			  },
			  "referrerPolicy": "strict-origin-when-cross-origin",
			  "body": `${bodyFields(modes,indexArray,tab)[i]}`,
			  "method": "POST",
			  "mode": "cors",
			  "credentials": "include"
			}).then(()=>toastr.info('Поле '+(i+1)+' создано!', 'Информация'));;
		}
	} else alert('Введен неверный параметр. Введеье слово "all"');
})

//Конец "создание своих полей"


//Посмотреть название поля API (два раза кликнуть по названию поля)

$('body').on('dblclick', '.form-group .left-column', function(){
	let hideInput = `<div id="hideInp" style="opacity: 0"><input type="text"></div>`
	if ($('#hideInp').html()==undefined) $('#wrapper').append(hideInput);
	$('#hideInp input').val($(this).parent('.form-group').attr('data-field')).select()
	document.execCommand("copy");
	toastr.info('Информация в буфере обмена', 'Скопировал!')
})


//Закрепить первую КОлонку. Таблица - Аналитика

$(document).ready(function(){

if(window.location.href.indexOf('/analytic?')!=-1) {
	let  styleTable=`<style>th:nth-of-type(1),td:nth-of-type(1) {-webkit-box-shadow: -1px 0px 0px 0px rgba(34, 60, 80, 0.13) inset;-moz-box-shadow: -1px 0px 0px 0px rgba(34, 60, 80, 0.13) inset;box-shadow: -1px 0px 0px 0px rgba(34, 60, 80, 0.13) inset;position: sticky;left: 0; border-right: none!important; background:#fff;}</style>`;
	$('body').append(styleTable)
	}
})