<?php
global $page_num;
$emo_path = 'emoticons/';

$lim_val = 30;
$offset_val = $page_num * 30;

function db_connect(){
	//db connection
	global $db_instance;
	$db_instance = new mysqli('127.0.0.1','root','','magana');

	//check for connection error
	if ($db_instance->connect_error) {
		# code...
		die("Connection failed: " . $db_instance->connect_error);
	}
}

function parseString($string) {
	global $emo_path;
	$my_smilies = array(
		'(angry)' => '<img src="' . $emo_path . 'angry.gif" alt="" />',
        ':@' => '<img src="' . $emo_path . 'angry.gif" alt="" />',
        ':-@' => '<img src="' . $emo_path . 'angry.gif" alt="" />',
        ':=@' => '<img src="' . $emo_path . 'angry.gif" alt="" />',
        'x(' => '<img src="' . $emo_path . 'angry.gif" alt="" />',
        'x-(' => '<img src="' . $emo_path . 'angry.gif" alt="" />',
        'x=(' => '<img src="' . $emo_path . 'angry.gif" alt="" />',
        'X(' => '<img src="' . $emo_path . 'angry.gif" alt="" />',
        'X-(' => '<img src="' . $emo_path . 'angry.gif" alt="" />',
        'X=(' => '<img src="' . $emo_path . 'angry.gif" alt="" />',
		'(angel)' => '<img src="' . $emo_path . 'angel.gif" alt="" />',
		'(smile)' => '<img src="' . $emo_path . 'smile.gif" alt="" />',
		':)' => '<img src="' . $emo_path . 'smile.gif" alt="" />',
		':-)' => '<img src="' . $emo_path . 'smile.gif" alt="" />',
		':=)' => '<img src="' . $emo_path . 'smile.gif" alt="" />',
		':(' => '<img src="' . $emo_path . 'sadsmile.gif" alt="" />',
		':-(' => '<img src="' . $emo_path . 'sadsmile.gif" alt="" />',
		':=(' => '<img src="' . $emo_path . 'sadsmile.gif" alt="" />',
		'(sad)' => '<img src="' . $emo_path . 'sadsmile.gif" alt="" />',
		'(bear)' => '<img src="' . $emo_path . 'bear.gif" alt="" />',
		'(hug)' => '<img src="' . $emo_path . 'bear.gif" alt="" />',
		'(beer)' => '<img src="' . $emo_path . 'beer.gif" alt="" />',
		
		':-D' => '<img src="' . $emo_path . 'bigsmile.gif" alt="" />',
		':D' => '<img src="' . $emo_path . 'bigsmile.gif" alt="" />',
		':=D' => '<img src="' . $emo_path . 'bigsmile.gif" alt="" />',
		':d' => '<img src="' . $emo_path . 'bigsmile.gif" alt="" />',
		':=d' => '<img src="' . $emo_path . 'bigsmile.gif" alt="" />',
		':-d' => '<img src="' . $emo_path . 'bigsmile.gif" alt="" />',

		'(bandit)' => '<img src="' . $emo_path . 'bandit.gif" alt="" />',
		
		'(blush)' => '<img src="' . $emo_path . 'blush.gif" alt="" />',
		':$' => '<img src="' . $emo_path . 'blush.gif" alt="" />',
		':-$' => '<img src="' . $emo_path . 'blush.gif" alt="" />',
		':">' => '<img src="' . $emo_path . 'blush.gif" alt="" />',

		'(bow)' => '<img src="' . $emo_path . 'bow.gif" alt="" />',
		'(heartbreak)' => '<img src="' . $emo_path . 'brokenheart.gif" alt="" />',
		'(bug)' => '<img src="' . $emo_path . 'bug.gif" alt="" />',
		'(cake)' => '<img src="' . $emo_path . 'cake.gif" alt="" />',
		'(call)' => '<img src="' . $emo_path . 'call.gif" alt="" />',
		'(cash)' => '<img src="' . $emo_path . 'cash.gif" alt="" />',
		'($)' => '<img src="' . $emo_path . 'cash.gif" alt="" />',
		'(clap)' => '<img src="' . $emo_path . 'clapping.gif" alt="" />',
		'(coffee)' => '<img src="' . $emo_path . 'coffee.gif" alt="" />',
		
		'B)' => '<img src="' . $emo_path . 'cool.gif" alt="" />',
		'B=)' => '<img src="' . $emo_path . 'cool.gif" alt="" />',
		'8)' => '<img src="' . $emo_path . 'cool.gif" alt="" />',
		'8-)' => '<img src="' . $emo_path . 'cool.gif" alt="" />',
		'8=)' => '<img src="' . $emo_path . 'cool.gif" alt="" />',
		'B-)' => '<img src="' . $emo_path . 'cool.gif" alt="" />',
		'(cool)' => '<img src="' . $emo_path . 'cool.gif" alt="" />',
		
		'(cry)' => '<img src="' . $emo_path . 'crying.gif" alt="" />',
		';(' => '<img src="' . $emo_path . 'crying.gif" alt="" />',
		';-(' => '<img src="' . $emo_path . 'crying.gif" alt="" />',
		';=(' => '<img src="' . $emo_path . 'crying.gif" alt="" />',
			
		'(dance)' => '<img src="' . $emo_path . 'dance.gif" alt="" />',
		'\o/' => '<img src="' . $emo_path . 'dance.gif" alt="" />',
		'\:D/' => '<img src="' . $emo_path . 'dance.gif" alt="" />',
		'\:d/' => '<img src="' . $emo_path . 'dance.gif" alt="" />',
		'/o/' => '<img src="' . $emo_path . 'dance.gif" alt="" />',

		'(devil)' => '<img src="' . $emo_path . 'devil.gif" alt="" />',
		'(doh)' => '<img src="' . $emo_path . 'doh.gif" alt="" />',
		
		'(drink)' => '<img src="' . $emo_path . 'drink.gif" alt="" />',
		'(d)' => '<img src="' . $emo_path . 'drink.gif" alt="" />',
		'(D)' => '<img src="' . $emo_path . 'drink.gif" alt="" />',

		'(drunk)' => '<img src="' . $emo_path . 'drunk.gif" alt="" />',

		'|-(' => '<img src="' . $emo_path . 'dull.gif" alt="" />',
		'|(' => '<img src="' . $emo_path . 'dull.gif" alt="" />',
		'|=(' => '<img src="' . $emo_path . 'dull.gif" alt="" />',
		'(-_-)' => '<img src="' . $emo_path . 'dull.gif" alt="" />',

		'(emo)' => '<img src="' . $emo_path . 'emo.gif" alt="" />',
		'(envy)' => '<img src="' . $emo_path . 'envy.gif" alt="" />',

		'(grin)' => '<img src="' . $emo_path . 'evilgrin.gif" alt="" />',
		'>:)' => '<img src="' . $emo_path . 'evilgrin.gif" alt="" />',
		']:)' => '<img src="' . $emo_path . 'evilgrin.gif" alt="" />',
		
		'(flower)' => '<img src="' . $emo_path . 'flower.gif" alt="" />',
		'(f)' => '<img src="' . $emo_path . 'flower.gif" alt="" />',
		'(F)' => '<img src="' . $emo_path . 'flower.gif" alt="" />',

		'(fubar)' => '<img src="' . $emo_path . 'fubar.gif" alt="" />',

		'(giggle)' => '<img src="' . $emo_path . 'giggle.gif" alt="" />',
		'(chuckle)' => '<img src="' . $emo_path . 'giggle.gif" alt="" />',

		'(handshake)' => '<img src="' . $emo_path . 'handshake.gif" alt="" />',

		'(happy)' => '<img src="' . $emo_path . 'happy.gif" alt="" />',

		'(headbang)' => '<img src="' . $emo_path . 'headbang.gif" alt="" />',
		'(banghead)' => '<img src="' . $emo_path . 'headbang.gif" alt="" />',

		'(hi)' => '<img src="' . $emo_path . 'hi.gif" alt="" />',
		
		'(heart)' => '<img src="' . $emo_path . 'heart.gif" alt="" />',
		'(h)' => '<img src="' . $emo_path . 'heart.gif" alt="" />',
		'(H)' => '<img src="' . $emo_path . 'heart.gif" alt="" />',
		'(I)' => '<img src="' . $emo_path . 'heart.gif" alt="" />',
		'(L)' => '<img src="' . $emo_path . 'heart.gif" alt="" />',

		'(heidy)' => '<img src="' . $emo_path . 'heidy.gif" alt="" />',
		'(inlove)' => '<img src="' . $emo_path . 'inlove.gif" alt="" />',
		'(itwasntme)' => '<img src="' . $emo_path . 'itwasntme.gif" alt="" />',
		'(kiss)' => '<img src="' . $emo_path . 'kiss.gif" alt="" />',
		'(>.<)' => '<img src="' . $emo_path . 'kiss.gif" alt="" />',
		'(lipssealed)' => '<img src="' . $emo_path . 'lipssealed.gif" alt="" />',
		'(mail)' => '<img src="' . $emo_path . 'mail.gif" alt="" />',
		'(makeup)' => '<img src="' . $emo_path . 'makeup.gif" alt="" />',
		'(malthe)' => '<img src="' . $emo_path . 'malthe.gif" alt="" />',
		'(fuckyou)' => '<img src="' . $emo_path . 'middlefinger.gif" alt="" />',
		'(middlefinger)' => '<img src="' . $emo_path . 'middlefinger.gif" alt="" />',
		'(mmm)' => '<img src="' . $emo_path . 'mmm.gif" alt="" />',
		'(mooning)' => '<img src="' . $emo_path . 'mooning.gif" alt="" />',
		
		'(movie)' => '<img src="' . $emo_path . 'movie.gif" alt="" />',
		'(film)' => '<img src="' . $emo_path . 'movie.gif" alt="" />',
		'(~)' => '<img src="' . $emo_path . 'movie.gif" alt="" />',
		
		'(muscle)' => '<img src="' . $emo_path . 'muscle.gif" alt="" />',
		'(flex)' => '<img src="' . $emo_path . 'muscle.gif" alt="" />',

		'(music)' => '<img src="' . $emo_path . 'music.gif" alt="" />',
		'(m)' => '<img src="' . $emo_path . 'music.gif" alt="" />',
		
		'(nerd)' => '<img src="' . $emo_path . 'nerd.gif" alt="" />',
		'8-|' => '<img src="' . $emo_path . 'nerd.gif" alt="" />',
		'B-|' => '<img src="' . $emo_path . 'nerd.gif" alt="" />',
		'8|' => '<img src="' . $emo_path . 'nerd.gif" alt="" />',
		'B|' => '<img src="' . $emo_path . 'nerd.gif" alt="" />',
		'8=|' => '<img src="' . $emo_path . 'nerd.gif" alt="" />',
		'B=|' => '<img src="' . $emo_path . 'nerd.gif" alt="" />',

		'(ninja)' => '<img src="' . $emo_path . 'ninja.gif" alt="" />',
		'(no)' => '<img src="' . $emo_path . 'no.gif" alt="" />',
		'(n)' => '<img src="' . $emo_path . 'no.gif" alt="" />',
		'(N)' => '<img src="' . $emo_path . 'no.gif" alt="" />',

		'(nod)' => '<img src="' . $emo_path . 'nod.gif" alt="" />',
		'(party)' => '<img src="' . $emo_path . 'party.gif" alt="" />',
		
		'(phone)' => '<img src="' . $emo_path . 'phone.gif" alt="" />',
		'(mp)' => '<img src="' . $emo_path . 'phone.gif" alt="" />',
		'(ph)' => '<img src="' . $emo_path . 'phone.gif" alt="" />',

		'(pizza)' => '<img src="' . $emo_path . 'pizza.gif" alt="" />',
		'(pi)' => '<img src="' . $emo_path . 'pizza.gif" alt="" />',

		'(poolparty)' => '<img src="' . $emo_path . 'poolparty.gif" alt="" />',
		'(priidu)' => '<img src="' . $emo_path . 'priidu.gif" alt="" />',

		':&' => '<img src="' . $emo_path . 'puke.gif" alt="" />',
		':-&' => '<img src="' . $emo_path . 'puke.gif" alt="" />',
		':=&' => '<img src="' . $emo_path . 'puke.gif" alt="" />',
		'(puke)' => '<img src="' . $emo_path . 'puke.gif" alt="" />',

		'(punch)' => '<img src="' . $emo_path . 'punch.gif" alt="" />',
		
		'(rain)' => '<img src="' . $emo_path . 'rain.gif" alt="" />',
		'(london)' => '<img src="' . $emo_path . 'rain.gif" alt="" />',
		'(st)' => '<img src="' . $emo_path . 'rain.gif" alt="" />',

		'(rock)' => '<img src="' . $emo_path . 'rock.gif" alt="" />',
		'(rofl)' => '<img src="' . $emo_path . 'rofl.gif" alt="" />',
		'(shake)' => '<img src="' . $emo_path . 'shake.gif" alt="" />',
		
		'(sleepy)' => '<img src="' . $emo_path . 'sleepy.gif" alt="" />',
		'|-)' => '<img src="' . $emo_path . 'sleepy.gif" alt="" />',
		'I-)' => '<img src="' . $emo_path . 'sleepy.gif" alt="" />',
		'I=)' => '<img src="' . $emo_path . 'sleepy.gif" alt="" />',
		'(snooze)' => '<img src="' . $emo_path . 'sleepy.gif" alt="" />',

		'(smirk)' => '<img src="' . $emo_path . 'smirk.gif" alt="" />',

		'(smoke)' => '<img src="' . $emo_path . 'smoke.gif" alt="" />',
		'(ci)' => '<img src="' . $emo_path . 'smoke.gif" alt="" />',
		'(smoking)' => '<img src="' . $emo_path . 'smoke.gif" alt="" />',

		'(speechless)' => '<img src="' . $emo_path . 'speechless.gif" alt="" />',
		':|' => '<img src="' . $emo_path . 'speechless.gif" alt="" />',
		':-|' => '<img src="' . $emo_path . 'speechless.gif" alt="" />',

		'(star)' => '<img src="' . $emo_path . 'star.gif" alt="" />',
		'(*)' => '<img src="' . $emo_path . 'star.gif" alt="" />',
		'(sun)' => '<img src="' . $emo_path . 'sun.gif" alt="" />',
		'(swear)' => '<img src="' . $emo_path . 'swear.gif" alt="" />',
		'(talk)' => '<img src="' . $emo_path . 'talking.gif" alt="" />',
		
		'(sweat)' => '<img src="' . $emo_path . 'sweating.gif" alt="" />',
		'(:|' => '<img src="' . $emo_path . 'sweating.gif" alt="" />',

		'(tauri)' => '<img src="' . $emo_path . 'tauri.gif" alt="" />',
		
		'(think)' => '<img src="' . $emo_path . 'thinking.gif" alt="" />',
		':?' => '<img src="' . $emo_path . 'thinking.gif" alt="" />',
		':-?' => '<img src="' . $emo_path . 'thinking.gif" alt="" />',
		':=?' => '<img src="' . $emo_path . 'thinking.gif" alt="" />',
		'(thinking)' => '<img src="' . $emo_path . 'thinking.gif" alt="" />',
		
		'(time)' => '<img src="' . $emo_path . 'time.gif" alt="" />',
		'(o)' => '<img src="' . $emo_path . 'time.gif" alt="" />',
		'(O)' => '<img src="' . $emo_path . 'time.gif" alt="" />',
		'(clock)' => '<img src="' . $emo_path . 'time.gif" alt="" />',

		'(tmi)' => '<img src="' . $emo_path . 'tmi.gif" alt="" />',
		'(toivo)' => '<img src="' . $emo_path . 'toivo.gif" alt="" />',

		'(tongue)' => '<img src="' . $emo_path . 'tongueout.gif" alt="" />',
		':P' => '<img src="' . $emo_path . 'tongueout.gif" alt="" />',
		':-p' => '<img src="' . $emo_path . 'tongueout.gif" alt="" />',
		':=p' => '<img src="' . $emo_path . 'tongueout.gif" alt="" />',
		':p' => '<img src="' . $emo_path . 'tongueout.gif" alt="" />',
		':-P' => '<img src="' . $emo_path . 'tongueout.gif" alt="" />',
		':=P' => '<img src="' . $emo_path . 'tongueout.gif" alt="" />',

		'(wait)' => '<img src="' . $emo_path . 'wait.gif" alt="" />',
		'(whew)' => '<img src="' . $emo_path . 'whew.gif" alt="" />',

		'(wink)' => '<img src="' . $emo_path . 'wink.gif" alt="" />',
		';-)' => '<img src="' . $emo_path . 'wink.gif" alt="" />',
		';)' => '<img src="' . $emo_path . 'wink.gif" alt="" />',
		
		'(wonder)' => '<img src="' . $emo_path . 'wondering.gif" alt="" />',
		':^)' => '<img src="' . $emo_path . 'wondering.gif" alt="" />',
		
		'(worried)' => '<img src="' . $emo_path . 'worried.gif" alt="" />',
		':S' => '<img src="' . $emo_path . '/worried.gif" alt="" />',
		':-S' => '<img src="' . $emo_path . 'worried.gif" alt="" />',
		':=S' => '<img src="' . $emo_path . 'worried.gif" alt="" />',
		':s' => '<img src="' . $emo_path . 'worried.gif" alt="" />',
		':-s' => '<img src="' . $emo_path . 'worried.gif" alt="" />',
		':=s' => '<img src="' . $emo_path . 'worried.gif" alt="" />',
		
		'(yawn)' => '<img src="' . $emo_path . 'yawn.gif" alt="" />',
		'|-()' => '<img src="' . $emo_path . 'yawn.gif" alt="" />',

		'(yes)' => '<img src="' . $emo_path . 'yes.gif" alt="" />',
		'(y)' => '<img src="' . $emo_path . 'yes.gif" alt="" />',
		'(Y)' => '<img src="' . $emo_path . 'yes.gif" alt="" />',

		'>c' => '<img src="' . $emo_path . 'jealous.png" alt="" />',
		'>-c' => '<img src="' . $emo_path . 'jealous.png" alt="" />',
		'>C' => '<img src="' . $emo_path . 'jealous.png" alt="" />',
		'>-C' => '<img src="' . $emo_path . 'jealous.png" alt="" />',
		'(jealous)' => '<img src="' . $emo_path . 'jealous.png" alt="" />',

		'(v)' => '<img src="' . $emo_path . 'victory.png" alt="" />',
		'(V)' => '<img src="' . $emo_path . 'victory.png" alt="" />',

		':o' => '<img src="' . $emo_path . 'jawdrop.png" alt="" />',
		':O' => '<img src="' . $emo_path . 'jawdrop.png" alt="" />',
		':-o' => '<img src="' . $emo_path . 'jawdrop.png" alt="" />',
		':-O' => '<img src="' . $emo_path . 'jawdrop.png" alt="" />',
		':=o' => '<img src="' . $emo_path . 'jawdrop.png" alt="" />',
		':=O' => '<img src="' . $emo_path . 'jawdrop.png" alt="" />',
		'(jawdrop)' => '<img src="' . $emo_path . 'jawdrop.png" alt="" />',

		'(greedy)' => '<img src="' . $emo_path . 'greedy.png" alt="" />',
		':E' => '<img src="' . $emo_path . 'scared.png" alt="" />',
		'(scared)' => '<img src="' . $emo_path . 'scared.png" alt="" />',
		'(nada)' => '<img src="' . $emo_path . 'nothing.png" alt="" />',
		'(shocked)' => '<img src="' . $emo_path . 'shocked.png" alt="" />',
		'(hmm)' => '<img src="' . $emo_path . 'ehen.png" alt="" />',
		'(cooler)' => '<img src="' . $emo_path . 'cooler.png" alt="" />',
		'BD' => '<img src="' . $emo_path . 'cooler.png" alt="" />',
		'8D' => '<img src="' . $emo_path . 'cooler.png" alt="" />',
		'B-D' => '<img src="' . $emo_path . 'cooler.png" alt="" />',
		'8-D' => '<img src="' . $emo_path . 'cooler.png" alt="" />'


    );
	
	return str_replace( array_keys($my_smilies), array_values($my_smilies), $string);
}



function show_emoticons(){
global $emo_path;

	$smily = '<img onclick = "angry()" src="' . $emo_path . 'angry.gif" alt="" />';
	$smily .= ' <img onclick = "angel()" src="' . $emo_path . 'angel.gif" alt="" />';
	$smily .= ' <img onclick = "smile()" src="' . $emo_path . 'smile.gif" alt="" />';
	$smily .=' <img onclick = "sadsmile()" src="' . $emo_path . 'sadsmile.gif" alt="" />';
	$smily .=' <img onclick = "bear()" src="' . $emo_path . 'bear.gif" alt="" />';
	$smily .=' <img onclick = "beer()" src="' . $emo_path . 'beer.gif" alt="" />';
	$smily .=' <img onclick = "bigsmile()" src="' . $emo_path . 'bigsmile.gif" alt="" />';
	$smily .=' <img onclick = "bandit()" src="' . $emo_path . 'bandit.gif" alt="" />';
	$smily .=' <img onclick = "blush()" src="' . $emo_path . 'blush.gif" alt="" />';
	$smily .=' <img onclick = "bow()" src="' . $emo_path . 'bow.gif" alt="" />';
	$smily .=' <img onclick = "brokenheart()" src="' . $emo_path . 'brokenheart.gif" alt="" />';
	$smily .=' <img onclick = "bug()" src="' . $emo_path . 'bug.gif" alt="" />';
	$smily .=' <img onclick = "cake()" src="' . $emo_path . 'cake.gif" alt="" />';
	$smily .=' <img onclick = "call()" src="' . $emo_path . 'call.gif" alt="" />';
	$smily .=' <img onclick = "cash()" src="' . $emo_path . 'cash.gif" alt="" />';
	$smily .=' <img onclick = "clap()" src="' . $emo_path . 'clapping.gif" alt="" />';
	$smily .=' <img onclick = "coffee()" src="' . $emo_path . 'coffee.gif" alt="" />';
	$smily .=' <img onclick = "cool()" src="' . $emo_path . 'cool.gif" alt="" />';
	$smily .=' <img onclick = "cry()" src="' . $emo_path . 'crying.gif" alt="" />';
	$smily .=' <img onclick = "dance()" src="' . $emo_path . 'dance.gif" alt="" />';
	$smily .=' <img onclick = "devil()" src="' . $emo_path . 'devil.gif" alt="" />';
	$smily .=' <img onclick = "doh()" src="' . $emo_path . 'doh.gif" alt="" />';
	$smily .=' <img onclick = "drink()" src="' . $emo_path . 'drink.gif" alt="" />';
	$smily .=' <img onclick = "drunk()" src="' . $emo_path . 'drunk.gif" alt="" />';
	$smily .=' <img onclick = "dull()" src="' . $emo_path . 'dull.gif" alt="" />';
	$smily .=' <img onclick = "emo()" src="' . $emo_path . 'emo.gif" alt="" />';
	$smily .=' <img onclick = "envy()" src="' . $emo_path . 'envy.gif" alt="" />';
	$smily .=' <img onclick = "grin()" src="' . $emo_path . 'evilgrin.gif" alt="" />';
	$smily .=' <img onclick = "flower()" src="' . $emo_path . 'flower.gif" alt="" />';
	$smily .=' <img onclick = "fubar()" src="' . $emo_path . 'fubar.gif" alt="" />';
	$smily .=' <img onclick = "giggle()" src="' . $emo_path . 'giggle.gif" alt="" />';
	$smily .=' <img onclick = "handshake()" src="' . $emo_path . 'handshake.gif" alt="" />';
	$smily .=' <img onclick = "happy()" src="' . $emo_path . 'happy.gif" alt="" />';
	$smily .=' <img onclick = "headbang()" src="' . $emo_path . 'headbang.gif" alt="" />';
	$smily .=' <img onclick = "hi()" src="' . $emo_path . 'hi.gif" alt="" />';
	$smily .=' <img onclick = "heart()" src="' . $emo_path . 'heart.gif" alt="" />';
	$smily .=' <img onclick = "heidy()" src="' . $emo_path . 'heidy.gif" alt="" />';
	$smily .=' <img onclick = "inlove()" src="' . $emo_path . 'inlove.gif" alt="" />';
	$smily .=' <img onclick = "itwasntme()" src="' . $emo_path . 'itwasntme.gif" alt="" />';
	$smily .=' <img onclick = "kiss()" src="' . $emo_path . 'kiss.gif" alt="" />';
	$smily .=' <img onclick = "lipssealed()" src="' . $emo_path . 'lipssealed.gif" alt="" />';
	$smily .=' <img onclick = "mail()" src="' . $emo_path . 'mail.gif" alt="" />';
	$smily .=' <img onclick = "makeup()" src="' . $emo_path . 'makeup.gif" alt="" />';
	$smily .=' <img onclick = "malthe()" src="' . $emo_path . 'malthe.gif" alt="" />';
	$smily .=' <img onclick = "middlefinger()" src="' . $emo_path . 'middlefinger.gif" alt="" />';
	$smily .=' <img onclick = "mmm()" src="' . $emo_path . 'mmm.gif" alt="" />';
	$smily .=' <img onclick = "mooning()" src="' . $emo_path . 'mooning.gif" alt="" />';
	$smily .=' <img onclick = "movie()" src="' . $emo_path . 'movie.gif" alt="" />';
	$smily .=' <img onclick = "muscle()" src="' . $emo_path . 'muscle.gif" alt="" />';
	$smily .=' <img onclick = "music()" src="' . $emo_path . 'music.gif" alt="" />';
	$smily .=' <img onclick = "nerd()" src="' . $emo_path . 'nerd.gif" alt="" />';
	$smily .=' <img onclick = "ninja()" src="' . $emo_path . 'ninja.gif" alt="" />';
	$smily .=' <img onclick = "no()" src="' . $emo_path . 'no.gif" alt="" />';
	$smily .=' <img onclick = "nod()" src="' . $emo_path . 'nod.gif" alt="" />';
	$smily .=' <img onclick = "party()" src="' . $emo_path . 'party.gif" alt="" />';
	$smily .=' <img onclick = "phone()" src="' . $emo_path . 'phone.gif" alt="" />';
	$smily .=' <img onclick = "pizza()" src="' . $emo_path . 'pizza.gif" alt="" />';
	$smily .=' <img onclick = "poolparty()" src="' . $emo_path . 'poolparty.gif" alt="" />';
	$smily .=' <img onclick = "priidu()" src="' . $emo_path . 'priidu.gif" alt="" />';
	$smily .=' <img onclick = "puke()" src="' . $emo_path . 'puke.gif" alt="" />';
	$smily .=' <img onclick = "punch()" src="' . $emo_path . 'punch.gif" alt="" />';
	$smily .=' <img onclick = "rain()" src="' . $emo_path . 'rain.gif" alt="" />';
	$smily .=' <img onclick = "rock()" src="' . $emo_path . 'rock.gif" alt="" />';
	$smily .=' <img onclick = "rofl()" src="' . $emo_path . 'rofl.gif" alt="" />';
	$smily .=' <img onclick = "shake()" src="' . $emo_path . 'shake.gif" alt="" />';
	$smily .=' <img onclick = "sleepy()" src="' . $emo_path . 'sleepy.gif" alt="" />';
	$smily .=' <img onclick = "smirk()" src="' . $emo_path . 'smirk.gif" alt="" />';
	$smily .=' <img onclick = "smoke()" src="' . $emo_path . 'smoke.gif" alt="" />';
	$smily .=' <img onclick = "speechless()" src="' . $emo_path . 'speechless.gif" alt="" />';
	$smily .=' <img onclick = "star()" src="' . $emo_path . 'star.gif" alt="" />';
	$smily .=' <img onclick = "sun()" src="' . $emo_path . 'sun.gif" alt="" />';
	$smily .=' <img onclick = "swear()" src="' . $emo_path . 'swear.gif" alt="" />';
	$smily .=' <img onclick = "talk()" src="' . $emo_path . 'talking.gif" alt="" />';
	$smily .=' <img onclick = "sweat()" src="' . $emo_path . 'sweating.gif" alt="" />';
	$smily .=' <img onclick = "tauri()" src="' . $emo_path . 'tauri.gif" alt="" />';
	$smily .=' <img onclick = "think()" src="' . $emo_path . 'thinking.gif" alt="" />';
	$smily .=' <img onclick = "time()" src="' . $emo_path . 'time.gif" alt="" />';
	$smily .=' <img onclick = "tmi()" src="' . $emo_path . 'tmi.gif" alt="" />';
	$smily .=' <img onclick = "toivo()" src="' . $emo_path . 'toivo.gif" alt="" />';
	$smily .=' <img onclick = "tongue()" src="' . $emo_path . 'tongueout.gif" alt="" />';
	$smily .=' <img onclick = "wait()" src="' . $emo_path . 'wait.gif" alt="" />';
	$smily .=' <img onclick = "whew()" src="' . $emo_path . 'whew.gif" alt="" />';
	$smily .=' <img onclick = "wink()" src="' . $emo_path . 'wink.gif" alt="" />';
	$smily .=' <img onclick = "wondering()" src="' . $emo_path . 'wondering.gif" alt="" />';
	$smily .=' <img onclick = "worried()" src="' . $emo_path . 'worried.gif" alt="" />';
	$smily .=' <img onclick = "yawn()" src="' . $emo_path . 'yawn.gif" alt="" />';
	$smily .=' <img onclick = "yes()" src="' . $emo_path . 'yes.gif" alt="" />';
	$smily .=' <img onclick = "cooler()" src="' . $emo_path . 'cooler.png" alt="" />';
	$smily .=' <img onclick = "jealous()" src="' . $emo_path . 'jealous.png" alt="" />';
	$smily .=' <img onclick = "victory()" src="' . $emo_path . 'victory.png" alt="" />';
	$smily .=' <img onclick = "jawdrop()" src="' . $emo_path . 'jawdrop.png" alt="" />';
	$smily .=' <img onclick = "greedy()" src="' . $emo_path . 'greedy.png" alt="" />';
	$smily .=' <img onclick = "scared()" src="' . $emo_path . 'scared.png" alt="" />';
	$smily .=' <img onclick = "nothing()" src="' . $emo_path . 'nothing.png" alt="" />';
	$smily .=' <img onclick = "shocked()" src="' . $emo_path . 'shocked.png" alt="" />';
	$smily .=' <img onclick = "hmm()" src="' . $emo_path . 'ehen.png" alt="" />';
		
	return $smily;
}

/*The idea is for all users to have just a single profile pic, they can change it but cannot have multiple
* the user pic folder should only hold a single profile pic*/

function fetch_user_pics($width, $height){

	$filePath='images/user_images/';
	$dir = opendir($filePath);

	while ($file = readdir($dir)) {

		if (mb_eregi("\.png",$file) || mb_eregi("\.jpg",$file) || mb_eregi("\.gif",$file) ) 
		{
			echo "<span>
					<img style = 'padding:2%;' name = 'img-name'  src='$filePath$file'  width='" .$width. "px' height='" .$height."px' style = 'border: 1px solid'/>
				 </span>";
		}
	}
}

function fetch_pic($photo_name, $width, $height){

	$img = "";
	$filePath='images/user_images/';
	$dir = opendir($filePath);
	while ($file = readdir($dir)) {
		
		if (mb_eregi("\.png",$file) || mb_eregi("\.jpg",$file) || mb_eregi("\.gif",$file) ) {
			$file_name = explode(".", $file);
			if ($file_name[0] == $photo_name) {
				$img = $file;
			}
		}
	}
	echo "<img src='$filePath$img'  width='" .$width. "px' height='" .$height."px' style = 'border: 1px solid'/>";
}

function include_user_navbar(){
	echo "<style type='text/css'>
		#navbar {visibility: visible;display: inline;}
	</style>";
}

function exclude_user_navbar(){
	echo "<style type='text/css'>
		#navbar {visibility: hidden;display: none;}
	</style>";
}

function generate_salt($len){
	//Not 100% unique or random, but good enough for a salt
	//MD5 returns 32 chars
	$unique_random_str = md5(uniqid(mt_rand(), true));

	//valid chars for a salt are [a-zA-Z0-9./]
	$base64_str = base64_encode($unique_random_str);

	//but not + which is valid in base64 encoding
	$modified_base64_str = str_replace("+", ".", $base64_str);

	//Truncate str to the correct len
	$salt = substr($modified_base64_str, 0, $len);

	return $salt;
}

function password_check($password, $existing_hash){

	//existing hash contains format and salt at start
	$hash = crypt($password, $existing_hash);
	if ($hash === $existing_hash)
		return true;
	else
		return false;
}

function password_encrypt($password){

	//tell PHP to user Blowfish with a cost of 10
	$hash_format = "$2y$10$";

	//Blowfish should be 22 chars or more
	$salt_len = 22;

	$salt = generate_salt($salt_len);
	$format_and_salt = $hash_format . $salt;

	$hash = crypt($password, $format_and_salt);
	return $hash;
}

function printTitle(){
	switch ($_SERVER['PHP_SELF']) {
		/*Root Path with uppercase 'M' as in 'Magana'*/
		case '/Magana/index.php':
			echo 'Magana | Home';
			break;
		case '/Magana/index.php':
			echo 'Magana | Home';
			break;
		case '/Magana/chat.php':
			echo 'Magana | Chat';
			break;
		case '/Magana/Edit_profile.php':
			echo 'Magana | Profile';
			break;
		case '/Magana/about.php':
			echo 'Magana | About';
			break;
		case '/Magana/terms.php':
			echo 'Magana | Terms';
			break;
		case '/Magana/forgot-password.php':
			echo 'Magana | Password Reset';
			break;
		case '/Magana/view_user.php':
			echo 'Magana | User';
			break;

		/*Root Path with lowercase 'm' as in 'magana'*/
		case '/magana/index.php':
			echo 'Magana | Home';
			break;
		case '/magana/index.php':
			echo 'Magana | Home';
			break;
		case '/magana/chat.php':
			echo 'Magana | Chat';
			break;
		case '/magana/Edit_profile.php':
			echo 'Magana | Profile';
			break;
		case '/magana/about.php':
			echo 'Magana | About';
			break;
		case '/magana/terms.php':
			echo 'Magana | Terms';
			break;
		case '/magana/forgot-password.php':
			echo 'Magana | Password Reset';
			break;
		case '/magana/view_user.php':
			echo 'Magana | User';
			break;
		default:
			echo 'Magana';
			break;
	}
}
		
?>