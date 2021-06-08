/*Наличие «форточек»: у групп студентов*/
SELECT
  lessons.idlesson,
  lessons_1.idlesson,
  groupstudents.groupnumber AS 'Номер группы',
  lessons.lessondate AS 'Дата',
  lessons.lessontime AS 'Начало занятия',
  lessons_1.lessontime AS 'Начало след. занятия',
  CONCAT(EXTRACT(HOUR FROM lessons_1.lessontime) - (EXTRACT(HOUR FROM lessons.lessontime)+lessons.hours),' часа ',EXTRACT(MINUTE FROM lessons_1.lessontime) - EXTRACT(MINUTE FROM lessons.lessontime),' минут')AS 'Перерыв'

FROM lessons
  INNER JOIN lessons lessons_1
    ON lessons.idlesson <> lessons_1.idlesson
    AND lessons.idclassroom = lessons_1.idclassroom
    AND lessons.lessondate = lessons_1.lessondate
    AND lessons.lessontime <= lessons_1.lessontime
  INNER JOIN groupteachers
    ON lessons.idgroupteacher = groupteachers.idgroupteacher
  INNER JOIN groupteachers groupteachers_1
    ON lessons_1.idgroupteacher = groupteachers_1.idgroupteacher
  INNER JOIN groupstudents
    ON groupteachers.idgroup = groupstudents.idgroup
    AND groupteachers.idcurriculum = groupstudents.idcurriculum
  INNER JOIN groupstudents groupstudents_1
    ON groupteachers_1.idgroup = groupstudents_1.idgroup
    AND groupteachers_1.idcurriculum = groupstudents_1.idcurriculum
WHERE EXTRACT(HOUR FROM lessons.lessontime) + lessons.hours + 1 <= EXTRACT(HOUR FROM lessons_1.lessontime);


/*Наличие «форточек»: у преподавателей*/
SELECT
  lessons.idlesson,
  lessons_1.idlesson,
  CONCAT(teachers.surname, ' ', teachers.name, ' ',teachers.middlename) AS 'ФИО',
  lessons.lessontime AS 'Начало занятия',
  lessons_1.lessontime AS 'Начало след. занятия',
  lessons.lessondate AS 'Дата',
  CONCAT(EXTRACT(HOUR FROM lessons_1.lessontime) - (EXTRACT(HOUR FROM lessons.lessontime)+lessons.hours),' часа ',EXTRACT(MINUTE FROM lessons_1.lessontime) - EXTRACT(MINUTE FROM lessons.lessontime),' минут')AS 'Перерыв'
FROM lessons
  INNER JOIN lessons lessons_1
    ON lessons.idlesson <> lessons_1.idlesson
    AND lessons.idclassroom = lessons_1.idclassroom
    AND lessons.lessondate = lessons_1.lessondate
    AND lessons.lessontime <= lessons.lessontime
  INNER JOIN groupteachers
    ON lessons.idgroupteacher = groupteachers.idgroupteacher
  INNER JOIN groupteachers groupteachers_1
    ON lessons_1.idgroupteacher = groupteachers_1.idgroupteacher
  INNER JOIN teachers
    ON groupteachers.idteacher = teachers.idteacher
WHERE EXTRACT(HOUR FROM lessons.lessontime) + lessons.hours + 1 <= EXTRACT(HOUR FROM lessons_1.lessontime);

/*Наличие «накладок»:у групп студентов*/
SELECT
  lessons.idlesson,
  lessons_1.idlesson,
  groupstudents.groupnumber AS 'Номер группы',
  lessons.idclassroom AS 'Номер кабинета',
  lessons.lessontime AS 'Начало первого занятия',
  lessons_1.lessontime AS 'Начало след. занятия',
  lessons.lessondate AS 'Дата'
FROM lessons
  INNER JOIN lessons lessons_1
    ON lessons.idlesson <> lessons_1.idlesson
    AND lessons.lessontime <= lessons_1.lessontime
    AND lessons.lessondate = lessons_1.lessondate
    AND lessons.idclassroom = lessons_1.idclassroom
  INNER JOIN groupteachers
    ON lessons.idgroupteacher = groupteachers.idgroupteacher
  INNER JOIN groupteachers groupteachers_1
    ON lessons_1.idgroupteacher = groupteachers_1.idgroupteacher
  INNER JOIN groupstudents
    ON groupteachers.idgroup = groupstudents.idgroup
    AND groupteachers.idcurriculum = groupstudents.idcurriculum
  INNER JOIN groupstudents groupstudents_1
    ON groupteachers_1.idgroup = groupstudents_1.idgroup
    AND groupteachers_1.idcurriculum = groupstudents_1.idcurriculum
    AND groupstudents.idgroup = groupstudents_1.idgroup
WHERE EXTRACT(HOUR FROM lessons.lessontime) + lessons.hours BETWEEN EXTRACT(HOUR FROM lessons_1.lessontime) AND EXTRACT(HOUR FROM lessons.lessontime) + lessons.hours;


/*Наличие «накладок»: у преподавателей*/
SELECT
  lessons.idlesson,
  lessons_1.idlesson,
  CONCAT(teachers.surname, ' ', teachers.name, ' ', teachers.middlename) AS 'ФИО',
  lessons.lessontime AS 'Начало первого занятия',
  lessons_1.lessontime AS 'Начало след. занятия',
  lessons.idclassroom AS 'Номер кабинета',
  lessons.lessondate AS 'Дата'
FROM lessons
  INNER JOIN lessons lessons_1
    ON lessons.lessondate = lessons_1.lessondate
    AND lessons.idlesson <> lessons_1.idlesson
    AND lessons.lessontime <= lessons_1.lessontime
    AND lessons.idclassroom = lessons_1.idclassroom
  INNER JOIN groupteachers
    ON lessons.idgroupteacher = groupteachers.idgroupteacher
  INNER JOIN groupteachers groupteachers_1
    ON lessons_1.idgroupteacher = groupteachers_1.idgroupteacher
    AND groupteachers.idteacher = groupteachers_1.idteacher
  INNER JOIN teachers
    ON groupteachers.idteacher = teachers.idteacher
WHERE EXTRACT(HOUR FROM lessons.lessontime) + lessons.hours BETWEEN EXTRACT(HOUR FROM lessons_1.lessontime) AND EXTRACT(HOUR FROM lessons.lessontime) + lessons.hours;


/*Поиск свободных аудиторий в заданный период времени*/
SELECT
  lessons.idlesson,
  lessons_1.idlesson,
  classrooms.classroomnumber AS 'Номер кабинета',
  lessons.lessontime AS 'Время начала',
  CONCAT((EXTRACT(HOUR FROM lessons.lessontime)+lessons.hours), ':',EXTRACT(MINUTE FROM lessons.lessontime)) AS 'Время освобождения аудитории',
  lessons_1.lessontime AS 'Время след. занятия',
  lessons.lessondate AS 'Дата'
  FROM lessons
  INNER JOIN lessons lessons_1
    ON lessons.idlesson <> lessons_1.idlesson
    AND lessons.lessondate = lessons_1.lessondate
    AND lessons.idclassroom = lessons_1.idclassroom
    AND lessons.lessontime <= lessons_1.lessontime
  INNER JOIN classrooms
    ON lessons.idclassroom = classrooms.idclassroom
  INNER JOIN classrooms classrooms_1
    ON lessons_1.idclassroom = classrooms_1.idclassroom
WHERE EXTRACT(HOUR FROM lessons.lessontime) + lessons.hours <= EXTRACT(HOUR FROM lessons_1.lessontime)
AND lessons.lessontime <= '13:40:00'
AND lessons_1.lessontime >= '14:40:00'