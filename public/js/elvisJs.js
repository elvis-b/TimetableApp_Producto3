function loadEvents(data) {
    let desiredEvents = [];
    for (var item of data) {
        let allDatesForSchedule = getEveryForDayOfWeek(item.day, item.subject.date_start, item.subject.date_end);

        for (var dateInSchedule of allDatesForSchedule) {
            let event = {};
            event.title = item.name+" "+item.subject.name;
            event.start = dateInSchedule + " " + item.schedule.time_start;
            event.end = dateInSchedule + " " + item.schedule.time_end;
            desiredEvents.push(event);
        }
    }
    return desiredEvents;
}


function calculateEachDayOfWeek(start, end) {
    let allDates = [];
    let startDate = new Date(start);
    let endDate = new Date(end);

    while (startDate < endDate) {
        var yyyy = startDate.getFullYear();

        var mm = (startDate.getMonth() + 1);
        mm = (mm < 10) ? '0' + mm : mm;

        var dd = startDate.getDate();
        dd = (dd < 10) ? '0' + dd : dd;

        allDates.push(yyyy + '-' + mm + '-' + dd);

        startDate.setDate(startDate.getDate() + 7);
    }
    return allDates;
}

function nextDayAndTime(dayOfWeek, start) {
    var now = new Date(start);
    var result = new Date(
        now.getFullYear(),
        now.getMonth(),
        now.getDate() + (7 + dayOfWeek - now.getDay()) % 7,
        1,
        1)

    if (result < now)
        result.setDate(result.getDate() + 7)

    return result
}

function getEveryForDayOfWeek(dayOfWeek, start, end) {
    let days = {
        'Domingo': 0,
        'Lunes': 1,
        'Martes': 2,
        'Miércoles': 3,
        'Jueves': 4,
        'Viernes': 5,
        'Sábado': 6
    }

    let dayOfWeekIndex = days[dayOfWeek];
    let closestDayOfWeek = nextDayAndTime(dayOfWeekIndex, start);
    let allDaysOfType = calculateEachDayOfWeek(closestDayOfWeek, end);
    return allDaysOfType;
}


