<?php if (!defined('BB2_CORE')) die('I said no cheating!');

function bb2_blacklist($package) {

	// Blacklisted user agents
	// These user agent strings occur at the beginning of the line.
	$bb2_spambots_0 = array(
		"8484 Boston Project",	// video poker/porn spam
		"adwords",		// referrer spam
		"autoemailspider",	// spam harvester
		"blogsearchbot-martin",	// from honeypot
		"BrowserEmulator/",	// open proxy software
		"CherryPicker",		// spam harvester
		"core-project/",	// FrontPage extension exploits
		"Diamond",		// delivers spyware/adware
		"Digger",		// spam harvester
		"ecollector",		// spam harvester
		"EmailCollector",	// spam harvester
		"Email Siphon",		// spam harvester
		"EmailSiphon",		// spam harvester
		"Forum Poster",		// forum spambot
		"grub crawler",		// misc comment/email spam
		"HttpProxy",		// misc comment/email spam
		"Internet Explorer",	// XMLRPC exploits seen
		"ISC Systems iRc",	// spam harvester
		"Jakarta Commons",	// customised spambots
		"Java 1.",		// unidentified robots
		"Java/1.",		// unidentified robots
		"libwww-perl",		// unidentified robots
		"LWP",			// unidentified robots
		"lwp",			// unidentified robots
		"Microsoft Internet Explorer/",	// too old; assumed robot
		"Microsoft URL",	// unidentified robots
		"Missigua",		// spam harvester
		"MJ12bot/v1.0.8",	// malicious botnet
		"Movable Type",		// customised spambots
		"Mozilla ",		// malicious software
		"Mozilla/0",		// malicious software
		"Mozilla/1",		// malicious software
		"Mozilla/2",		// malicious software
		"Mozilla/3",		// malicious software
		"Mozilla/4.0(",		// from honeypot
		"Mozilla/4.0+(compatible;+",	// suspicious harvester
		"MSIE",			// malicious software
		"MVAClient",		// automated hacking attempts
		"NutchCVS",		// unidentified robots
		"Nutscrape/",		// misc comment spam
		"OmniExplorer",		// spam harvester
		"Opera/9.64(",		// comment spam bot
		"psycheclone",		// spam harvester
		"PussyCat ",		// misc comment spam
		"PycURL",		// misc comment spam
		"Python-urllib",	// commonly abused
//		WP 2.5 now has Flash; FIXME
//		"Shockwave Flash",	// spam harvester
		"Super Happy Fun ",	// spam harvester
		"TrackBack/",		// trackback spam
		"user",			// suspicious harvester
		"User Agent: ",		// spam harvester
		"User-Agent: ",		// spam harvester
		"WebSite-X Suite",	// misc comment spam
		"Winnie Poh",		// Automated Coppermine hacks
		"Wordpress",		// malicious software
		"\"",			// malicious software
	);

	// These user agent strings occur anywhere within the line.
	$bb2_spambots = array(
		"\r",			// A really dumb bot
		"<sc",			// XSS exploit attempts
		"; Widows ",		// misc comment/email spam
		"a href=",		// referrer spam
		"Bad Behavior Test",	// Add this to your user-agent to test BB
		"compatible ; MSIE",	// misc comment/email spam
		"compatible-",		// misc comment/email spam
		"DTS Agent",		// misc comment/email spam
		"Email Extractor",	// spam harvester
		"Firebird/",		// too old; assumed robot
		"Gecko/25",		// revisit this in 500 years
		"grub-client",		// search engine ignores robots.txt
		"hanzoweb",		// very badly behaved crawler
		"Indy Library",		// misc comment/email spam
		"MSIE 7.0;  Windows NT 5.2",	// Cyveillance
		"Murzillo compatible",	// comment spam bot
		".NET CLR 1)",		// free poker, etc.
		".NET CLR1",		// spam harvester
		"Perman Surfer",	// old and very broken harvester
		"POE-Component-Client",	// free poker, etc.
		"Turing Machine",	// www.anonymizer.com abuse
		"Ubuntu/9.25",		// comment spam bot
		"unspecified.mail",	// stealth harvesters
		"User-agent: ",		// spam harvester/splogger
		"WebaltBot",		// spam harvester
		"WISEbot",		// spam harvester
		"WISEnutbot",		// spam harvester
		"Win95",		// too old; assumed robot
		"Win98",		// too old; assumed robot
		"WinME",		// too old; assumed robot
		"Win 9x 4.90",		// too old; assumed robot
		"Windows 3",		// too old; assumed robot
		"Windows 95",		// too old; assumed robot
		"Windows 98",		// too old; assumed robot
		"Windows NT 4",		// too old; assumed robot
		"Windows NT;",		// too old; assumed robot
		#"Windows NT 4.0;)",	// wikispam bot
		"Windows NT 5.0;)",	// wikispam bot
		"Windows NT 5.1;)",	// wikispam bot
		"Windows XP 5",		// spam harvester
		"WordPress/4.01",	// pingback spam
		"Xedant Human Emulator",// spammer script engine
		"\\\\)",		// spam harvester
	);

	// These are regular expression matches.
	$bb2_spambots_regex = array(
		"/^[A-Z]{10}$/",	// misc email spam
// msnbot is using this fake user agent string now
//		"/^Mozilla...[05]$/i",	// fake user agent/email spam
		"/[bcdfghjklmnpqrstvwxz ]{8,}/",
//		"/(;\){1,2}$/",		// misc spammers/harvesters
//		"/MSIE.*Windows XP/",	// misc comment spam
		"/MSIE [2345]/",	// too old; assumed robot
	);

	// Do not edit below this line.

	@$ua = $package['headers_mixed']['User-Agent'];

	foreach ($bb2_spambots_0 as $spambot) {
		$pos = strpos($ua, $spambot);
		if ($pos !== FALSE && $pos == 0) {
			return "17f4e8c8";
		}
	}

	foreach ($bb2_spambots as $spambot) {
		if (strpos($ua, $spambot) !== FALSE) {
			return "17f4e8c8";
		}
	}

	foreach ($bb2_spambots_regex as $spambot) {
		if (preg_match($spambot, $ua)) {
			return "17f4e8c8";
		}
	}

	return FALSE;
}
