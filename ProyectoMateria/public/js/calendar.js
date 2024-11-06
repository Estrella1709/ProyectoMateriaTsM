// script.js

const monthNames = ["Enero", "Febrero", "Marzo", "Abril", "Mayo", "Junio", "Julio", "Agosto", "Septiembre", "Octubre", "Noviembre", "Diciembre"];
const calendarDays = document.getElementById("calendar-days");
const monthYear = document.getElementById("month-year");
let currentDate = new Date();

function renderCalendar(date) {
    calendarDays.innerHTML = "";
    const year = date.getFullYear();
    const month = date.getMonth();
    
    // Actualizar encabezado de mes y año
    monthYear.textContent = `${monthNames[month]} ${year}`;
    
    // Obtener primer día del mes y el último día del mes
    const firstDay = new Date(year, month, 1).getDay(); // Día de la semana del primer día del mes
    const lastDate = new Date(year, month + 1, 0).getDate(); // Último día del mes
    
    // Ajuste para que el primer día sea lunes
    const adjustedFirstDay = (firstDay === 0 ? 6 : firstDay - 1);
    
    // Rellenar días en blanco antes del primer día del mes
    for (let i = 0; i < adjustedFirstDay; i++) {
        const blankDay = document.createElement("div");
        calendarDays.appendChild(blankDay);
    }
    
    // Rellenar los días del mes
    for (let day = 1; day <= lastDate; day++) {
        const dayElement = document.createElement("div");
        dayElement.textContent = day;
        calendarDays.appendChild(dayElement);
    }
}

// Eventos para cambiar de mes
document.getElementById("prev-month").addEventListener("click", () => {
    currentDate.setMonth(currentDate.getMonth() - 1);
    renderCalendar(currentDate);
});

document.getElementById("next-month").addEventListener("click", () => {
    currentDate.setMonth(currentDate.getMonth() + 1);
    renderCalendar(currentDate);
});

// Renderizar el calendario al cargar la página
renderCalendar(currentDate);
