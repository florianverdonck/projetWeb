INSERT INTO `attendance_sheets` (`attendance_sheet_id`, `seance_template_id`, `mail`, `week_id`) VALUES
(1, 1, 'jeanluc.collinet@ipl.be', 14),
(2, 2, 'jeanluc.collinet@ipl.be', 17),
(3, 3, 'jeanluc.collinet@ipl.be', 20);

INSERT INTO `attendances` (`attendance_id`, `attendance`, `student_id`, `attendance_sheet_id`, `sick_note`) VALUES
(1, 'absent', 143, 1, 'justified'),
(2, 'present', 143, 2, NULL),
(3, '3', 143, 3, NULL);