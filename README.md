# School-Inga
 

Project Title - A teacher creates groups and involves students.

Description

The whole project is done on a Laravel framework. The first time a teacher visits a page, if there is no project created, he creates it. When creating, indicate how many groups there will be in the project and what the expected number of students is. As soon as the teacher saves the project, groups that already have a name are automatically created. The teacher can change the number of project groups and students by pressing the EDIT button. Pressing the SHOW button displays all the information about the project: name, number of groups, number of students. If there are no students, there is an "ADD Student" button. It is possible to create a unique student. Until the student is assigned to a group, "-" is displayed. Models and tables. Four models are used:

Projects - stored information about projects.
Groups - Stores information about groups.
Students - information about students.
AttendanceGroup - an auxiliary table for storing information about which students are assigned to which group.
Navigation: / projects - create, predict groups, number of students, edit, delete. / projects / show - information about projects. Students can be assigned here. /students - all studentslist. /groups - all groups list.

If the group is full, no more students can be assigned to it. Students can be created only unique (tables -> unique ()), bug - errors message not fixed.

Vision: • Use the RESTfull API (student-side) • Refresh every 10 sec.
