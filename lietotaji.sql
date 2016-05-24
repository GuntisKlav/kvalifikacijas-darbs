CREATE TABLE IF NOT EXISTS lietotaji (
	id int(11) NOT NULL AUTO_INCREMENT,
	lietotajvards varchar(255) NOT NULL, 
	vards varchar(255) NOT NULL, 
    uzvards varchar(255) NOT NULL, 
    epasts varchar(255) NOT NULL, 
    parole varchar(25) NOT NULL, 
    pierakstisanas_datums date NOT NULL, 
    aktivizets enum('0', '1') NOT NULL,
    PRIMARY KEY ('id')
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;