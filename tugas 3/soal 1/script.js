function convertGrade() {
    const grade = parseInt(document.getElementById('gradeInput').value);
    let letterGrade;

    if (grade >= 0 && grade <= 40) {
        letterGrade = 'E';
    } else if (grade >= 41 && grade <= 55) {
        letterGrade = 'D';
    } else if (grade >= 56 && grade <= 60) {
        letterGrade = 'C';
    } else if (grade >= 61 && grade <= 65) {
        letterGrade = 'BC';
    } else if (grade >= 66 && grade <= 70) {
        letterGrade = 'B';
    } else if (grade >= 71 && grade <= 80) {
        letterGrade = 'AB';
    } else if (grade >= 81 && grade <= 100) {
        letterGrade = 'A';
    } else {
        letterGrade = 'Invalid input';
    }

    document.getElementById('result').innerText = `The letter grade is: ${letterGrade}`;
}
