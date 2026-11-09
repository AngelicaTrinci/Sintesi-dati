function ControllaCF(cf)
{
	var validi, i, s, set1, set2, setpari, setdisp;
	if( cf == '' )  return '';
	cf = cf.toUpperCase();
	if( cf.length != 16 )
		return "La lunghezza del codice fiscale non e'\n"
		+"corretta: il codice fiscale dovrebbe essere lungo\n"
		+"esattamente 16 caratteri.\n";
	validi = "ABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789";
	for( i = 0; i < 16; i++ ){
		if( validi.indexOf( cf.charAt(i) ) == -1 )
			return "Il codice fiscale contiene un carattere non valido `" +
				cf.charAt(i) +
				"'.\nI caratteri validi sono le lettere e le cifre.\n";
	}
	set1 = "0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZ";
	set2 = "ABCDEFGHIJABCDEFGHIJKLMNOPQRSTUVWXYZ";
	setpari = "ABCDEFGHIJKLMNOPQRSTUVWXYZ";
	setdisp = "BAKPLCQDREVOSFTGUHMINJWZYX";
	s = 0;
	for( i = 1; i <= 13; i += 2 )
		s += setpari.indexOf( set2.charAt( set1.indexOf( cf.charAt(i) )));
	for( i = 0; i <= 14; i += 2 )
		s += setdisp.indexOf( set2.charAt( set1.indexOf( cf.charAt(i) )));
	if( s%26 != cf.charCodeAt(15)-'A'.charCodeAt(0) )
		return "Il codice fiscale non e' corretto:\n"+
			"il codice di controllo non corrisponde.\n";
	return "";
}


function ControllaPIVA(pi)
{
	if( pi == '' )  return '';
	if( pi.length != 11 )
		return "La lunghezza della partita IVA non e'\n" +
			"corretta: la partita IVA dovrebbe essere lunga\n" +
			"esattamente 11 caratteri.\n";
	validi = "0123456789";
	for( i = 0; i < 11; i++ ){
		if( validi.indexOf( pi.charAt(i) ) == -1 )
			return "La partita IVA contiene un carattere non valido `" +
				pi.charAt(i) + "'.\nI caratteri validi sono le cifre.\n";
	}
	s = 0;
	for( i = 0; i <= 9; i += 2 )
		s += pi.charCodeAt(i) - '0'.charCodeAt(0);
	for( i = 1; i <= 9; i += 2 ){
		c = 2*( pi.charCodeAt(i) - '0'.charCodeAt(0) );
		if( c > 9 )  c = c - 9;
		s += c;
	}
	if( ( 10 - s%10 )%10 != pi.charCodeAt(10) - '0'.charCodeAt(0) )
		return "La partita IVA non e' valida:\n" +
			"il codice di controllo non corrisponde.\n";
	return '';
}


function verificaCFPI(value)
{
	cod = value;
	

	if( cod == '' )
		err = "hai lasciato in bianco il campo!\n";
	else if( cod.length == 16 )
		err = ControllaCF(cod);
	else if( cod.length == 11 )
		err = ControllaPIVA(cod);
	else
		err = "Il codice introdotto non e' valido:\n\n" +
			"  - un codice fiscale deve essere lungo 16 caratteri;\n\n" +
			"  - una partita IVA deve essere lunga 11 caratteri.\n";

	if( err > '' )
		alert("VALORE ERRATO\n\n" + err + "\nCorreggi e riprova!");
	
		
}