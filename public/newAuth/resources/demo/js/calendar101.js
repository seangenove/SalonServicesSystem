/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
$(function() {
		$('#wrapper .version strong').text('v' + $.fn.pignoseCalendar.ComponentVersion);
		function onSelectHandler(date, context) {
			/**
			 * @date is an array which be included dates(clicked date at first index)
			 * @context is an object which stored calendar interal data.
             * @context.calendar is a root element reference.
			 * @context.calendar is a calendar element reference.
			 * @context.storage.activeDates is all toggled data, If you use toggle type calendar.
             * @context.storage.events is all events associated to this date
			 */

            var $element = context.element;
			var $calendar = context.calendar;
			var $box = $element.siblings('.box').show();
			var text = 'You choose date ';

			if(date[0] !== null) {
				text += date[0].format('YYYY-MM-DD');
			}

			if(date[0] !== null && date[1] !== null) {
				text += ' ~ ';
			} else if(date[0] === null && date[1] == null) {
				text += 'nothing';
			}

			if(date[1] !== null) {
				text += date[1].format('YYYY-MM-DD');
			}

			$box.text(text);
		}

        function onApplyHandler(date, context) {
            /**
             * @date is an array which be included dates(clicked date at first index)
             * @context is an object which stored calendar interal data.
             * @context.calendar is a root element reference.
             * @context.calendar is a calendar element reference.
             * @context.storage.activeDates is all toggled data, If you use toggle type calendar.
             * @context.storage.events is all events associated to this date
             */

            var $element = context.element;
            var $calendar = context.calendar;
            var $box = $element.siblings('.box').show();
            var text = 'You applied date ';

            if(date[0] !== null) {
                text += date[0].format('YYYY-MM-DD');
            }

            if(date[0] !== null && date[1] !== null) {
                text += ' ~ ';
            } else if(date[0] === null && date[1] == null) {
                text += 'nothing';
            }

            if(date[1] !== null) {
                text += date[1].format('YYYY-MM-DD');
            }

            $box.text(text);
        }

		// Default Calendar
		$('.calendar').pignoseCalendar({
      select: onSelectHandler
		});

		// Input Calendar
		$('.input-calendar').pignoseCalendar({
      select: onSelectHandler,
      apply: onApplyHandler,
			buttons: true, // It means you can give bottom button controller to the modal which be opened when you click.
		});

		// Calendar modal
		var $btn = $('.btn-calendar').pignoseCalendar({
      select: onSelectHandler,
      apply: onApplyHandler,
			modal: true, // It means modal will be showed when you click the target button.
			buttons: true
		});

		// Color theme type Calendar
		$('.calendar-dark').pignoseCalendar({
			theme: 'dark', // light, dark, blue
			select: onSelectHandler
		});

		// Blue theme type Calendar
		$('.calendar-blue').pignoseCalendar({
			theme: 'blue', // light, dark, blue
			select: onSelectHandler
		});

		// Schedule Calendar
		$('.calendar-schedules').pignoseCalendar({
			scheduleOptions: {
				colors: {
				    holiday: '#2fabb7',
					seminar: '#5c6270',
					meetup:  '#ef8080'
				}
			},
			schedules: [{
				name: 'holiday',
			    date: '2017-02-08'
			}, {
				name: 'holiday',
			    date: '2017-02-16'
			}, {
				name: 'holiday',
			    date: '2017-03-01',
			}, {
				name: 'holiday',
			    date: '2017-03-05'
			}, {
				name: 'holiday',
			    date: '2017-03-18',
			}, {
				name: 'seminar',
			    date: '2017-02-14'
			}, {
				name: 'seminar',
			    date: '2017-03-01',
			}, {
				name: 'meetup',
			    date: '2017-02-16'
			}, {
				name: 'meetup',
			    date: '2017-03-01',
			}, {
				name: 'meetup',
			    date: '2017-03-18'
			}, {
				name: 'meetup',
			    date: '2017-04-04',
			}, {
				name: 'meetup',
			    date: '2017-05-01'
			}, {
				name: 'meetup',
			    date: '2017-06-19',
			}],
			select: function(date, context) {
				var message = `You selected ${(date[0] === null? 'null':date[0].format('YYYY-MM-DD'))}.
							   <br />
							   <br />
							   <strong>Events for this date</strong>
							   <br />
							   <br />
							   <div class="schedules-date"></div>`;
				var $target = context.calendar.parent().next().show().html(message);

				for(var idx in context.storage.schedules) {
					var schedule = context.storage.schedules[idx];
					if(typeof schedule !== 'object') {
						continue;
					}
					$target.find('.schedules-date').append('<span class="ui label default">' + schedule.name + '</span>');
				}
			}
		});

		// Multiple picker type Calendar
		$('.multi-select-calendar').pignoseCalendar({
			multiple: true,
			select: onSelectHandler
		});

		// Toggle type Calendar
		$('.toggle-calendar').pignoseCalendar({
			toggle: true,
			select: function(date, context) {
				var message = `You selected ${(date[0] === null? 'null':date[0].format('YYYY-MM-DD'))}.
							   <br />
							   <br />
							   <strong>Events for this date</strong>
							   <br />
							   <br />
							   <div class="active-dates"></div>`;
				var $target = context.calendar.parent().next().show().html(message);

				for(var idx in context.storage.activeDates) {
					var date = context.storage.activeDates[idx];
					if(typeof date !== 'string') {
						continue;
					}
					$target.find('.active-dates').append('<span class="ui label default">' + date + '</span>');
				}
			}
		});	

		// Multiple Week Select
		$('.pick-weeks-calendar').pignoseCalendar({
			pickWeeks: true,
			multiple: true,
			select: onSelectHandler
		});

		

		// This use for DEMO page tab component.
		$('.menu .item').tab();
	});

