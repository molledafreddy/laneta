<?php

use Illuminate\Database\Seeder;

class CounstriesTableSeeder extends Seeder
{
	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
		DB::table('countries')->insert([
			['iso_code'=>'AFG', 'tel_code'=>'93', 		'name'=>'Afganistán'],
			['iso_code'=>'ALB', 'tel_code'=>'355', 		'name'=>'Albania'],
			['iso_code'=>'DEU', 'tel_code'=>'49', 		'name'=>'Alemania'],
			['iso_code'=>'AND', 'tel_code'=>'376', 		'name'=>'Andorra'],
			['iso_code'=>'AGO', 'tel_code'=>'244', 		'name'=>'Angola'],
			['iso_code'=>'AIA', 'tel_code'=>'1 264', 	'name'=>'Anguila'],
			['iso_code'=>'ATA', 'tel_code'=>'6721', 	'name'=>'Antártida'],
			['iso_code'=>'ATG', 'tel_code'=>'1 268', 	'name'=>'Antigua y Barbuda'],
			['iso_code'=>'SAU', 'tel_code'=>'966', 		'name'=>'Arabia Saudita'],
			['iso_code'=>'DZA', 'tel_code'=>'213', 		'name'=>'Argelia'],
			['iso_code'=>'ARG', 'tel_code'=>'54', 		'name'=>'Argentina'],
			['iso_code'=>'ARM', 'tel_code'=>'374', 		'name'=>'Armenia'],
			['iso_code'=>'ABW', 'tel_code'=>'297', 		'name'=>'Aruba'],
			['iso_code'=>'AUS', 'tel_code'=>'61', 		'name'=>'Australia'],
			['iso_code'=>'AUT', 'tel_code'=>'43', 		'name'=>'Austria'],
			['iso_code'=>'AZE', 'tel_code'=>'994', 		'name'=>'Azerbaiyán'],
			['iso_code'=>'BHS', 'tel_code'=>'1 242', 	'name'=>'Bahamas'],
			['iso_code'=>'BGD', 'tel_code'=>'880', 		'name'=>'Bangladés'],
			['iso_code'=>'BRB', 'tel_code'=>'1 246', 	'name'=>'Barbados'],
			['iso_code'=>'BHR', 'tel_code'=>'973', 		'name'=>'Baréin'],
			['iso_code'=>'BEL', 'tel_code'=>'32', 		'name'=>'Bélgica'],
			['iso_code'=>'BLZ', 'tel_code'=>'501', 		'name'=>'Belice'],
			['iso_code'=>'BEN', 'tel_code'=>'229', 		'name'=>'Benín'],
			['iso_code'=>'BMU', 'tel_code'=>'1 441', 	'name'=>'Bermudas'],
			['iso_code'=>'BLR', 'tel_code'=>'375', 		'name'=>'Bielorrusia'],
			['iso_code'=>'BOL', 'tel_code'=>'591', 		'name'=>'Bolivia, Estado Plurinacional de'],
			['iso_code'=>'BES', 'tel_code'=>'5997', 	'name'=>'Bonaire, San Eustaquio y Saba'],
			['iso_code'=>'BIH', 'tel_code'=>'387', 		'name'=>'Bosnia y Herzegovina'],
			['iso_code'=>'BWA', 'tel_code'=>'267', 		'name'=>'Botsuana'],
			['iso_code'=>'BRA', 'tel_code'=>'55', 		'name'=>'Brasil'],
			['iso_code'=>'BRN', 'tel_code'=>'673', 		'name'=>'Brunéi Darussalam'],
			['iso_code'=>'BGR', 'tel_code'=>'359', 		'name'=>'Bulgaria'],
			['iso_code'=>'BFA', 'tel_code'=>'226', 		'name'=>'Burkina Faso'],
			['iso_code'=>'BDI', 'tel_code'=>'257', 		'name'=>'Burundi'],
			['iso_code'=>'BTN', 'tel_code'=>'975', 		'name'=>'Bután'],
			['iso_code'=>'CPV', 'tel_code'=>'238', 		'name'=>'Cabo Verde'],
			['iso_code'=>'KHM', 'tel_code'=>'855', 		'name'=>'Camboya'],
			['iso_code'=>'CMR', 'tel_code'=>'237', 		'name'=>'Camerún'],
			['iso_code'=>'CAN', 'tel_code'=>'1', 		'name'=>'Canadá'],
			['iso_code'=>'TCD', 'tel_code'=>'235', 		'name'=>'Chad'],
			['iso_code'=>'CHL', 'tel_code'=>'56', 		'name'=>'Chile'],
			['iso_code'=>'CHN', 'tel_code'=>'86', 		'name'=>'China, República Popular'],
			['iso_code'=>'CYP', 'tel_code'=>'357', 		'name'=>'Chipre'],
			['iso_code'=>'COL', 'tel_code'=>'57', 		'name'=>'Colombia'],
			['iso_code'=>'COM', 'tel_code'=>'269', 		'name'=>'Comoras'],
			['iso_code'=>'COD', 'tel_code'=>'242', 		'name'=>'Congo, La República Democrática del'],
			['iso_code'=>'COG', 'tel_code'=>'243', 		'name'=>'Congo'],
			['iso_code'=>'KOR', 'tel_code'=>'82', 		'name'=>'Corea, República de'],
			['iso_code'=>'PRK', 'tel_code'=>'850', 		'name'=>'Corea, República Democrática Popular de'],
			['iso_code'=>'CIV', 'tel_code'=>'225', 		'name'=>'Costa de Marfil'],
			['iso_code'=>'CRI', 'tel_code'=>'506', 		'name'=>'Costa Rica'],
			['iso_code'=>'HRV', 'tel_code'=>'385', 		'name'=>'Croacia'],
			['iso_code'=>'CUB', 'tel_code'=>'53', 		'name'=>'Cuba'],
			['iso_code'=>'CUW', 'tel_code'=>'599', 		'name'=>'Curazao'],
			['iso_code'=>'DNK', 'tel_code'=>'45', 		'name'=>'Dinamarca'],
			['iso_code'=>'DMA', 'tel_code'=>'1 767', 	'name'=>'Dominica'],
			['iso_code'=>'ECU', 'tel_code'=>'593', 		'name'=>'Ecuador'],
			['iso_code'=>'EGY', 'tel_code'=>'20', 		'name'=>'Egipto'],
			['iso_code'=>'SLV', 'tel_code'=>'503', 		'name'=>'El Salvador'],
			['iso_code'=>'ARE', 'tel_code'=>'971', 		'name'=>'Emiratos Árabes Unidos'],
			['iso_code'=>'ERI', 'tel_code'=>'291', 		'name'=>'Eritrea'],
			['iso_code'=>'SVK', 'tel_code'=>'421', 		'name'=>'Eslovaquia'],
			['iso_code'=>'SVN', 'tel_code'=>'386', 		'name'=>'Eslovenia'],
			['iso_code'=>'ESP', 'tel_code'=>'34', 		'name'=>'España'],
			['iso_code'=>'USA', 'tel_code'=>'1', 		'name'=>'Estados Unidos'],
			['iso_code'=>'EST', 'tel_code'=>'372', 		'name'=>'Estonia'],
			['iso_code'=>'ETH', 'tel_code'=>'251', 		'name'=>'Etiopía'],
			['iso_code'=>'RUS', 'tel_code'=>'7', 		'name'=>'Federacion Rusa'],
			['iso_code'=>'PHL', 'tel_code'=>'63', 		'name'=>'Filipinas'],
			['iso_code'=>'FIN', 'tel_code'=>'358', 		'name'=>'Finlandia'],
			['iso_code'=>'FJI', 'tel_code'=>'679', 		'name'=>'Fiyi'],
			['iso_code'=>'FRA', 'tel_code'=>'33', 		'name'=>'Francia'],
			['iso_code'=>'GAB','tel_code'=>'241', 		'name'=>'Gabón'],
			['iso_code'=>'GMB', 'tel_code'=>'220', 		'name'=>'Gambia'],
			['iso_code'=>'GEO', 'tel_code'=>'995', 		'name'=>'Georgia'],
			['iso_code'=>'GHA', 'tel_code'=>'233', 		'name'=>'Ghana'],
			['iso_code'=>'GIB', 'tel_code'=>'350', 		'name'=>'Gibraltar'],
			['iso_code'=>'GRD', 'tel_code'=>'1 473', 	'name'=>'Granada'],
			['iso_code'=>'GRC', 'tel_code'=>'30', 		'name'=>'Grecia'],
			['iso_code'=>'GRL', 'tel_code'=>'299', 		'name'=>'Groenlandia'],
			['iso_code'=>'GLP', 'tel_code'=>'590', 		'name'=>'Guadalupe'],
			['iso_code'=>'GUM', 'tel_code'=>'1 671', 	'name'=>'Guam'],
			['iso_code'=>'GTM', 'tel_code'=>'502', 		'name'=>'Guatemala'],
			['iso_code'=>'GUF', 'tel_code'=>'594', 		'name'=>'Guayana Francesa'],
			['iso_code'=>'GGY', 'tel_code'=>'44', 		'name'=>'Guernsey'],
			['iso_code'=>'GNB', 'tel_code'=>'245', 		'name'=>'Guinea-Bisáu'],
			['iso_code'=>'GNQ', 'tel_code'=>'240', 		'name'=>'Guinea Ecuatorial'],
			['iso_code'=>'GIN', 'tel_code'=>'224', 		'name'=>'Guinea'],
			['iso_code'=>'GUY', 'tel_code'=>'592', 		'name'=>'Guyana'],
			['iso_code'=>'HTI', 'tel_code'=>'509', 		'name'=>'Haití'],
			['iso_code'=>'HND', 'tel_code'=>'504', 		'name'=>'Honduras'],
			['iso_code'=>'HKG', 'tel_code'=>'852', 		'name'=>'Hong Kong'],
			['iso_code'=>'HUN', 'tel_code'=>'36', 		'name'=>'Hungría'],
			['iso_code'=>'IND', 'tel_code'=>'91', 		'name'=>'India'],
			['iso_code'=>'IDN', 'tel_code'=>'62', 		'name'=>'Indonesia'],
			['iso_code'=>'IRQ', 'tel_code'=>'964', 		'name'=>'Irak'],
			['iso_code'=>'IRN', 'tel_code'=>'98', 		'name'=>'Irán, República Islámica de'],
			['iso_code'=>'IRL', 'tel_code'=>'353',		'name'=> 'Irlanda'],
			['iso_code'=>'BVT', 'tel_code'=>'47', 		'name'=>'Isla Bouvet'],
			['iso_code'=>'IMN', 'tel_code'=>'44', 		'name'=>'Isla de Man'],
			['iso_code'=>'CXR', 'tel_code'=>'61', 		'name'=>'Isla de Navidad'],
			['iso_code'=>'NFK', 'tel_code'=>'6723', 	'name'=>'Isla Norfolk'],
			['iso_code'=>'ISL', 'tel_code'=>'354',		'name'=> 'Islandia'],
			['iso_code'=>'ALA', 'tel_code'=>'358 18', 	'name'=>'Islas Åland'],
			['iso_code'=>'CYM', 'tel_code'=>'1 345', 	'name'=>'Islas Caimán'],
			['iso_code'=>'CCK', 'tel_code'=>'61', 		'name'=>'Islas Cocos (Keeling)'],
			['iso_code'=>'COK', 'tel_code'=>'682',		'name'=> 'Islas Cook'],
			['iso_code'=>'FLK', 'tel_code'=>'500',		'name'=> 'Islas Falkland (Malvinas)'],
			['iso_code'=>'FRO', 'tel_code'=>'298',		'name'=> 'Islas Feroe'],
			['iso_code'=>'SGS', 'tel_code'=>'500',		'name'=> 'Islas Georgias del Sur y Sandwich del Sur'],
			['iso_code'=>'HMD', 'tel_code'=>'1 672', 	'name'=>'Islas Heard y Mcdonald'],
			['iso_code'=>'MNP', 'tel_code'=>'1 670', 	'name'=>'Islas Marianas del Norte'],
			['iso_code'=>'MHL', 'tel_code'=>'692',		'name'=> 'Islas Marshall'],
			['iso_code'=>'SLB', 'tel_code'=>'677',		'name'=> 'Islas Salomón'],
			['iso_code'=>'TCA', 'tel_code'=>'1 649', 	'name'=>'Islas Turcas y Caicos'],
			['iso_code'=>'UMI', 'tel_code'=>'1 808', 	'name'=>'Islas Ultramarinas Menores de Estados Unidos'],
			['iso_code'=>'VGB', 'tel_code'=>'1 284', 	'name'=>'Islas Virgenes Británicas'],
			['iso_code'=>'VIR', 'tel_code'=>'1 340', 	'name'=>'Islas Virgenes de Los Estados Unidos'],
			['iso_code'=>'ISR', 'tel_code'=>'972',		'name'=> 'Israel'],
			['iso_code'=>'ITA', 'tel_code'=>'39', 		'name'=>'Italia'],
			['iso_code'=>'JAM', 'tel_code'=>'1 876', 	'name'=>'Jamaica'],
			['iso_code'=>'JPN', 'tel_code'=>'81', 		'name'=>'Japón'],
			['iso_code'=>'JEY', 'tel_code'=>'44', 		'name'=>'Jersey'],
			['iso_code'=>'JOR', 'tel_code'=>'962',		'name'=> 'Jordania'],
			['iso_code'=>'KAZ', 'tel_code'=>'7', 		'name'=>'Kazajistán'],
			['iso_code'=>'KEN', 'tel_code'=>'254',		'name'=> 'Kenia'],
			['iso_code'=>'KGZ', 'tel_code'=>'996',		'name'=> 'Kirguistán'],
			['iso_code'=>'KIR', 'tel_code'=>'686',		'name'=> 'Kiribati'],
			['iso_code'=>'KWT', 'tel_code'=>'965',		'name'=> 'Kuwait'],
			['iso_code'=>'LSO', 'tel_code'=>'266',		'name'=> 'Lesoto'],
			['iso_code'=>'LVA', 'tel_code'=>'371',		'name'=> 'Letonia'],
			['iso_code'=>'LBN', 'tel_code'=>'961',		'name'=> 'Líbano'],
			['iso_code'=>'LBR', 'tel_code'=>'231',		'name'=> 'Liberia'],
			['iso_code'=>'LBY', 'tel_code'=>'218',		'name'=> 'Libia'],
			['iso_code'=>'LIE', 'tel_code'=>'423',		'name'=> 'Liechtenstein'],
			['iso_code'=>'LTU', 'tel_code'=>'370',		'name'=> 'Lituania'],
			['iso_code'=>'LUX', 'tel_code'=>'352',		'name'=> 'Luxemburgo'],
			['iso_code'=>'MAC', 'tel_code'=>'853',		'name'=> 'Macao'],
			['iso_code'=>'MKD', 'tel_code'=>'389',		'name'=> 'Macedonia, La Antigua República Yugoslava de'],
			['iso_code'=>'MDG', 'tel_code'=>'261',		'name'=> 'Madagascar'],
			['iso_code'=>'MYS', 'tel_code'=>'60', 		'name'=>'Malasia'],
			['iso_code'=>'MWI', 'tel_code'=>'265',		'name'=> 'Malaui'],
			['iso_code'=>'MDV', 'tel_code'=>'960',		'name'=> 'Maldivas'],
			['iso_code'=>'MLI', 'tel_code'=>'223',		'name'=> 'Malí'],
			['iso_code'=>'MLT', 'tel_code'=>'356',		'name'=> 'Malta'],
			['iso_code'=>'MAR', 'tel_code'=>'212',		'name'=> 'Marruecos'],
			['iso_code'=>'MTQ', 'tel_code'=>'596',		'name'=> 'Martinica'],
			['iso_code'=>'MUS', 'tel_code'=>'230',		'name'=> 'Mauricio'],
			['iso_code'=>'MRT', 'tel_code'=>'222',		'name'=> 'Mauritania'],
			['iso_code'=>'MYT', 'tel_code'=>'262',		'name'=> 'Mayotte'],
			['iso_code'=>'MEX', 'tel_code'=>'52', 		'name'=>'México'],
			['iso_code'=>'FSM', 'tel_code'=>'691',		'name'=> 'Micronesia, Estados Federados de'],
			['iso_code'=>'MDA', 'tel_code'=>'373',		'name'=> 'Moldavia, República de'],
			['iso_code'=>'MCO', 'tel_code'=>'377',		'name'=> 'Mónaco'],
			['iso_code'=>'MNG', 'tel_code'=>'976',		'name'=> 'Mongolia'],
			['iso_code'=>'MNE', 'tel_code'=>'382',		'name'=> 'Montenegro'],
			['iso_code'=>'MSR', 'tel_code'=>'1 664', 	'name'=>'Montserrat'],
			['iso_code'=>'MOZ', 'tel_code'=>'258',		'name'=> 'Mozambique'],
			['iso_code'=>'MMR', 'tel_code'=>'95', 		'name'=>'Myanmar'],
			['iso_code'=>'NAM', 'tel_code'=>'264',		'name'=> 'Nabimia'],
			['iso_code'=>'NRU', 'tel_code'=>'674',		'name'=> 'Nauru'],
			['iso_code'=>'NPL', 'tel_code'=>'977',		'name'=> 'Nepal'],
			['iso_code'=>'NIC', 'tel_code'=>'505',		'name'=> 'Nicaragua'],
			['iso_code'=>'NGA', 'tel_code'=>'234',		'name'=> 'Nigeria'],
			['iso_code'=>'NER', 'tel_code'=>'227',		'name'=> 'Níger'],
			['iso_code'=>'NIU', 'tel_code'=>'683',		'name'=> 'Niue'],
			['iso_code'=>'NOR', 'tel_code'=>'47', 		'name'=>'Noruega'],
			['iso_code'=>'NCL', 'tel_code'=>'687',		'name'=> 'Nueva Caledonia'],
			['iso_code'=>'NZL', 'tel_code'=>'64', 		'name'=>'Nueva Zelanda'],
			['iso_code'=>'OMN', 'tel_code'=>'968',		'name'=> 'Omán'],
			['iso_code'=>'NLD', 'tel_code'=>'31', 		'name'=>'Países Bajos'],
			['iso_code'=>'PAK', 'tel_code'=>'92', 		'name'=>'Pakistán'],
			['iso_code'=>'PLW', 'tel_code'=>'680',		'name'=> 'Palaos'],
			['iso_code'=>'PSE', 'tel_code'=>'970',		'name'=> 'Palestina, Estado de'],
			['iso_code'=>'PAN', 'tel_code'=>'507',		'name'=> 'Panamá'],
			['iso_code'=>'PNG', 'tel_code'=>'675',		'name'=> 'Papúa Nueva Guinea'],
			['iso_code'=>'PRY', 'tel_code'=>'595',		'name'=> 'Paraguay'],
			['iso_code'=>'PER', 'tel_code'=>'51', 		'name'=>'Perú'],
			['iso_code'=>'PCN', 'tel_code'=>'64', 		'name'=>'Pitcairn'],
			['iso_code'=>'PYF', 'tel_code'=>'689',		'name'=> 'Polinesia Francesa'],
			['iso_code'=>'POL', 'tel_code'=>'48', 		'name'=>'Polonia'],
			['iso_code'=>'PRT', 'tel_code'=>'351',		'name'=> 'Portugal'],
			['iso_code'=>'PRI', 'tel_code'=>'1 5/6', 	'name'=>'Puerto Rico'],
			['iso_code'=>'QAT', 'tel_code'=>'974',		'name'=> 'Qatar'],
			['iso_code'=>'GBR', 'tel_code'=>'44', 		'name'=>'Reino Unido'],
			['iso_code'=>'CAF', 'tel_code'=>'236',		'name'=> 'República Centroafricana'],
			['iso_code'=>'CZE', 'tel_code'=>'420',		'name'=> 'República Checa'],
			['iso_code'=>'LAO', 'tel_code'=>'856',		'name'=> 'República Democrática Popular Lao'],
			['iso_code'=>'DOM', 'tel_code'=>'1 809/829/849', 		'name'=>'República Dominicana'],
			['iso_code'=>'REU', 'tel_code'=>'262',		'name'=> 'Reunión'],
			['iso_code'=>'RWA', 'tel_code'=>'250',		'name'=> 'Ruanda'],
			['iso_code'=>'ROU', 'tel_code'=>'40', 		'name'=>'Rumania'],
			['iso_code'=>'ESH', 'tel_code'=>'212 28', 	'name'=>'Sahara Occidental'],
			['iso_code'=>'ASM', 'tel_code'=>'1 684', 	'name'=>'Samoa Americana'],
			['iso_code'=>'WSM', 'tel_code'=>'685',		'name'=> 'Samoa'],
			['iso_code'=>'BLM', 'tel_code'=>'590',		'name'=> 'San Bartolomé'],
			['iso_code'=>'KNA', 'tel_code'=>'1 869', 	'name'=>'San Cristóbal y Nieves'],
			['iso_code'=>'SMR', 'tel_code'=>'378',		'name'=> 'San Marino'],
			['iso_code'=>'MAF', 'tel_code'=>'590',		'name'=> 'San Martín (Parte Francesa)'],
			['iso_code'=>'SPM', 'tel_code'=>'508',		'name'=> 'San Pedro y Miquelón'],
			['iso_code'=>'VCT', 'tel_code'=>'1 784', 	'name'=>'San Vicente y Las Granadinas'],
			['iso_code'=>'SHN', 'tel_code'=>'290',		'name'=> 'Santa Helena, Ascensión y Tristán de Acuña'],
			['iso_code'=>'LCA', 'tel_code'=>'1 758', 	'name'=>'Santa Lucía'],
			['iso_code'=>'VAT', 'tel_code'=>'379',		'name'=> 'Santa Sede (Ciudad Estado Vaticano)'],
			['iso_code'=>'STP', 'tel_code'=>'239',		'name'=> 'Santo Tomé y Principe'],
			['iso_code'=>'SEN', 'tel_code'=>'221',		'name'=> 'Senegal'],
			['iso_code'=>'SRB', 'tel_code'=>'381',		'name'=> 'Serbia'],
			['iso_code'=>'SYC', 'tel_code'=>'248',		'name'=> 'Seychelles'],
			['iso_code'=>'SLE', 'tel_code'=>'232',		'name'=> 'Sierra Leona'],
			['iso_code'=>'SGP', 'tel_code'=>'65', 		'name'=>'Singapur'],
			['iso_code'=>'SXM', 'tel_code'=>'1 721', 	'name'=>'Sint Maarten (Parte Neerlandesa)'],
			['iso_code'=>'SYR', 'tel_code'=>'963',		'name'=> 'Siria, República Arabe de'],
			['iso_code'=>'SOM', 'tel_code'=>'252',		'name'=> 'Somalia'],
			['iso_code'=>'LKA', 'tel_code'=>'94', 		'name'=>'Sri Lanka'],
			['iso_code'=>'SWZ', 'tel_code'=>'268',		'name'=> 'Suazilandia'],
			['iso_code'=>'ZAF', 'tel_code'=>'27', 		'name'=>'Sudáfrica'],
			['iso_code'=>'SSD', 'tel_code'=>'211',		'name'=> 'Sudán del Sur'],
			['iso_code'=>'SDN', 'tel_code'=>'249',		'name'=> 'Sudán'],
			['iso_code'=>'SWE', 'tel_code'=>'46', 		'name'=>'Suecia'],
			['iso_code'=>'CHE', 'tel_code'=>'41', 		'name'=>'Suiza'],
			['iso_code'=>'SUR', 'tel_code'=>'597',		'name'=> 'Surinam'],
			['iso_code'=>'SJM', 'tel_code'=>'47', 		'name'=>'Svalbard y Jan Mayen'],
			['iso_code'=>'THA', 'tel_code'=>'66', 		'name'=>'Tailandia'],
			['iso_code'=>'TWN', 'tel_code'=>'886',		'name'=> 'Taiwán, Provincia de China'],
			['iso_code'=>'TZA', 'tel_code'=>'255',		'name'=> 'Tanzania, República Unida de'],
			['iso_code'=>'TJK', 'tel_code'=>'992',		'name'=> 'Tayikistán'],
			['iso_code'=>'IOT', 'tel_code'=>'246',		'name'=> 'Territorio Británico del Océano Índico'],
			['iso_code'=>'ATF', 'tel_code'=>'-', 		'name'=>'Territorios Australes Franceses'],
			['iso_code'=>'TLS', 'tel_code'=>'670',		'name'=> 'Timor-Leste'],
			['iso_code'=>'TGO', 'tel_code'=>'228',		'name'=> 'Togo'],
			['iso_code'=>'TKL', 'tel_code'=>'690',		'name'=> 'Tokelau'],
			['iso_code'=>'TON', 'tel_code'=>'676',		'name'=> 'Tonga'],
			['iso_code'=>'TTO', 'tel_code'=>'1 868', 	'name'=>'Trinidad y Tobago'],
			['iso_code'=>'TUN', 'tel_code'=>'216',		'name'=> 'Túnez'],
			['iso_code'=>'TKM', 'tel_code'=>'993',		'name'=> 'Turkmenistán'],
			['iso_code'=>'TUR', 'tel_code'=>'90', 		'name'=>'Turquía'],
			['iso_code'=>'TUV', 'tel_code'=>'688',		'name'=> 'Tuvalu'],
			['iso_code'=>'UKR', 'tel_code'=>'380',		'name'=> 'Ucrania'],
			['iso_code'=>'UGA', 'tel_code'=>'256',		'name'=> 'Uganda'],
			['iso_code'=>'URY', 'tel_code'=>'598',		'name'=> 'Uruguay'],
			['iso_code'=>'UZB', 'tel_code'=>'998',		'name'=> 'Uzbekistán'],
			['iso_code'=>'VUT', 'tel_code'=>'678',		'name'=> 'Vanuatu'],
			['iso_code'=>'VEN', 'tel_code'=>'58', 		'name'=>'Venezuela, República Bolivariana de'],
			['iso_code'=>'VNM', 'tel_code'=>'84', 		'name'=>'Viet Nam'],
			['iso_code'=>'WLF', 'tel_code'=>'681',		'name'=> 'Wallis y Futuna'],
			['iso_code'=>'YEM', 'tel_code'=>'967',		'name'=> 'Yemen'],
			['iso_code'=>'DJI', 'tel_code'=>'253',		'name'=> 'Yibuti'],
			['iso_code'=>'ZMB', 'tel_code'=>'260',		'name'=> 'Zambia'],
			['iso_code'=>'ZWE', 'tel_code'=>'263',		'name'=> 'Zimbabue']
		]);

	}
}