<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Horsenality Report</title>

<link rel="stylesheet"
	href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css"
	integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm"
	crossorigin="anonymous">

@if($template->forPDF)
<link href="{{ url('/') . '/assets/style.css' }}" rel="stylesheet" type="text/css" />

@endif

<link href="{{ url('/') . '/css/horsenality-pdf.css' }}" rel="stylesheet" type="text/css" />

</head>
<body>
	<div class="container-fluid my-5">
		<img alt="" class="w-100 front-page-image"
			src="{{asset('assets/reports/imgs/Background (23).png')}}">
		<h1 class="text-center pg-1-name">for {{$template->horsename}}</h1>
		<h6 class="card-subtitle mb-2 text-muted text-right pg-1-subtitle">Based on data
			provided by {{$template->firstNameE}} {{$template->lastNameE}}</h6>
		<h6 class="text-right pg-1-subtitle">{{$template->assessment_date}}</h6>

		<div class="page-break pg-1-end"></div>
		<div class="card header-spacing">
			<div class="card-header bg-secondary text-white fs-3 fw-bloder">Your
				Customized Horsenality Report</div>
		</div>
		<div class="row pg-2-container">
			<table>
				<tbody>
					<tr>
						<td class="w-50 script-font paragraph-spacing line-height-1-5">
							<div>Dear {{$template->firstNameE}},</div>
							<div>You have taken an important step in deeply understanding
								your horse, {{$template->horsename}}.</div>
							<div>As you learn more about {{$template->horsename}}'s
								Horsenality you'll be empowered to bring out the best in
								{{$template->pronoun['him-her-H']}} and avoid doing
								the things that unintentionally cause {{ $template->pronoun['him-her-H'] }} trouble or confusion.</div>
						</td>
						<td class="w-50"><img class="w-100"
							src="{{asset('assets/reports/imgs/Background (2).png')}}" /></td>
					</tr>
				</tbody>
			</table>
		</div>
		<div class="pg-2-container script-font">
			<div class="">
				{{$template->horsename}}'s Horsenality is made up of four things:

				<ol class="margin-30">
					<li>Innate Characteristics - what {{$template->pronoun['he-she-H']}} was born with.</li>
					<li>Learned Behavior, the good and the undesirable
						experiences in {{$template->pronoun['his-her-H']}} past!</li>
					<li>Environment - the herd, the training, the demands, the sights
						and sounds.</li>
					<li>Spirit - the level of intensity {{$template->pronoun['he-she-H']}} expresses {{$template->pronoun['himself-herself-H']}} with: mild, moderate, extreme.</li>
				</ol>
			</div>
			<div class="paragraph-spacing">
				<div>What you are going to learn about in this report is the
					behavioral part. You don't even need to know why it's happening as
					much as what to do when it happens. This alone will reshape
					{{$template->horsename}}'s behavior, encouraging emotional
					balance, self-confidence and trust in you as {{$template->pronoun['his-her-H']}} leader.</div>
				<div>It is my pleasure to be your personal guide. I'll help you
					understand what's going on with {{$template->horsename}} and
					advise you on the most effective ways to exercise and teach
					{{$template->pronoun['him-her-H']}}. I believe in putting
					the relationship first which means preserving the trust and
					enhancing the motivation for {{$template->horsename}} to be with
					you and to give you {{$template->pronoun['his-her-H']}}
					all, no matter what your goals are...from recreation to
					performance.</div>
				<div>Just as {{$template->horsename}} can be your dream horse, you
					will learn how to be {{$template->pronoun['his-her-H']}}
					dream partner</div>
				<div>Yours Naturally,</div>
			</div>

			<div class="">
				<img alt="" class=""
					src="{{asset('assets/reports/imgs/Background (24).png')}}"><br> Pat
				Parelli
			</div>
		</div>

		<div class="page-break"></div>
		<div class="card header-spacing">
			<div class="card-header bg-secondary text-white fs-3 fw-bloder">Report
				Contents</div>
		</div>
		<div class="inner-page pg-3">
			<div class="text-muted">PART 1</div>
			<div>The Parelli Horsenality Profile</div>

			<div class="text-muted">PART 2</div>
			<div>The Four Horsenality Types</div>

			<div class="text-muted">PART 3</div>
			<div>{{$template->horsename}}'s Horsenality Type</div>

			<div class="text-muted">PART 4</div>
			<div>Strategies for Success with {{$template->horsename}}</div>

			<div class="text-muted">PART 5</div>
			<div>Do's and Don'ts for {{$template->horsename}}</div>

			<div class="text-muted">PART 6</div>
			<div>Powerful Communication Keys</div>

			<div class="text-muted">PART 7</div>
			<div>Constructive Exercises for Success and Advancement</div>

			<div class="text-muted">PART 8</div>
			<div>The Right Balance between Variety and Consistency</div>

			<div class="text-muted">PART 9</div>
			<div>Design your Session for {{$template->horsename}}</div>

			<div class="text-muted">PART 10</div>
			<div>Situation-Specific Behaviors</div>

			<div class="text-muted">PART 11</div>
			<div>Adjust to fit the Changing Situation</div>

			<div class="text-muted">PART 12</div>
			<div>Strengths, Positive Characteristics, and Aptitudes</div>

			<div class="text-muted">PART 13</div>
			<div>Resources and More</div>
		</div>

		<div class="page-break"></div>
		<div class="card header-spacing">
			<div class="card-header bg-secondary text-white fs-3 fw-bloder">The
				Parelli Horsenality Profile</div>
		</div>
		
		<div class="inner-page paragraph-spacing pg-4">
			<div>Just as people have different personalities, horses have
				different Horsenalities. By completing the online assessment
				questionnaire, you have provided information that makes it possible
				for us to scientifically chart {{$template->horsename}} and
				determine {{$template->pronoun['his-her-H']}} Horsenality
				Profile.</div>
			<div>This section will tell you how we've done that. You'll gain a
				better understanding of the four Horsenality Types and the unique
				behaviors that pinpoint a horse's individual character.</div>
			<h3>The Four Horsenality Types</h3>
			<div>Horses tend to fall into one of four primary types. These are
				made up of combinations of Extrovert or Introvert, and Right-Brain
				(fearful) or Left-Brain (dominant) behaviors. When you look at the
				chart you'll see that it is a system of opposites.</div>
			<div>When you see {{$template->horsename}}'s profile, there will be a
				big red dot that tells you which quadrant {{$template->pronoun['he-she-H']}} fits into. The further that dot is from the
				center, the more extreme a version of this Horsenality
				{{$template->horsename}} is therefore, the more challenging
				{{$template->pronoun['he-she-H']}} can be to deal with.
				This distance from the center is a good indication of
				{{$template->horsename}}'s spirit level - mild, moderate or extreme.</div>
			<div class="row">

				<table class="table borderless">
					<tbody>
						<tr>
							<td class="w-70"><img alt="" class="w-100"
								src="{{asset('assets/reports/imgs/Background (3).png')}}"></td>
							<td class="w-30"><div class="bg-warning">
									<img alt="" class="w-100"
										src="{{asset('assets/reports/imgs/Background (4).png')}}">
									<div class="">The color of the shading indicates the horse's
										spirit level: Spirit level will tone down or amplify any
										Horsenality Type or specific behavior.</div>
								</div></td>
						</tr>
					</tbody>
				</table>
				<div class="w-75"></div>

			</div>
			<div class="w-100 float-start my-5">
				<h3 class="">Unique Characteristics and Specific Behaviors</h3>
				<!-- 						<img class="w-25 mb-5" alt="" -->
				<!-- 						src="{{asset('assets/reports/imgs/Background (5).png')}}"> -->
				<div>No matter what a horse's primary Horsenality Type is, you may
					find that certain characteristics show up that are 'all over the
					chart.' In fact the more that appear in different quadrants, the
					more 'interesting' your horse will be. Sometimes this means that
					your horse can be more challenging than another horse whose
					behaviors tend to stay within one quadrant.</div>
				<img class="w-100 my-5" alt=""
					src="{{asset('assets/reports/imgs/Background (6).png')}}">
				<div>
					<span class="fw-bolder">Note:</span> As you know, certain
					environments can make horses behave differently and the key will be
					to flex your strategies according to these changes rather than treat
					your horse the same as you always do.<br><br>This is because, technically,
					{{$template->pronoun['he-she-H']}} is acting like a
					different horse. How many times have you heard someone say, "But my
					horse never acts like this at home!"<br><br>
				</div>

				<table class="pg-5-table">
					<tbody>
						<tr>
							<td class="w-15"><img class="" alt=""
								src="{{asset('assets/reports/imgs/Background (7).png')}}"></td>
							<td class="w-85 line-height-1-5"><i>When your horse acts differently from
									{{$template->pronoun['his-her-H']}} usual Horsenality
									Type in certain situations, you need to respond
									differently...and appropriately. That's what great horsemen do.
									They automatically adjust.<br><br>Horses are living, breathing,
									emotional, and reactive beings. It is up to us to help our
									horses be balanced and confident, no matter what the situation
									is.</i></td>
						</tr>
					</tbody>
				</table>
			</div>
		</div>

		<div class="page-break"></div>

		<div class="card header-spacing">
			<div class="card-header bg-secondary text-white fs-3 fw-bloder">The
				Four Horsenality Types</div>
		</div>
		
		<div class="inner-page paragraph-spacing">
			<div>Essentially, a horse is either more Extrovert (a mover) or
				Introvert (a thinker), and is innately more confident and dominant
				(Left-Brain) or less confident and more fearful (Right-Brain).</div>
			<div>
				An <strong>EXTROVERTED</strong> (active, energetic) horse is a mover
				and seeks activity. Extroverts have to <i class="hand-writing">move
					before they can think</i>
			</div>
			<div>
				An <strong>INTROVERTED</strong> (inactive, low energy) horse is
				physically conservative. Introverts have to <i class="hand-writing">think
					before they can or want to move.</i>
			</div>
			<div>
				An <strong class="fw-bolder">LEFT-BRAIN</strong> (confident,
				dominant) horse is brave. In fact, they are not looking for a leader.
				They have a <i class="hand-writing">tendency to challenge your
					leadership.</i>
			</div>
			<div>
				An <strong class="fw-bolder">RIGHT-BRAIN</strong> (unconfident,
				fearful) horse is insecure and craves leadership. They are <i
					class="hand-writing">natural followers looking for natural leaders.</i>
			</div>
			<img class="w-100" alt=""
				src="{{asset('assets/reports/imgs/Background (8).png')}}">
		</div>
	</div>

	<div class="page-break"></div>

	<div class="card header-spacing">
		<div class="card-header bg-secondary text-white fs-3 fw-bloder">
			{{$template->horsename}}'s Horsenality Type</div>
	</div>
	
	<div class="inner-page pg-8 paragraph-spacing">
		<div class="graph-image">
			<img alt="" src="{{$template->graph['Horsenality-Overall-Rating-Graph']['path']}}">
		</div>

		<table>
			<tbody>
				<tr>
					<td class="ps-4 line-height-1-5">
						<h3 class="fw-bolder">About {{$template->horsename}}</h3>
						<div>{!! $template->statement['[H-Description]'] !!}</div>
					</td>
					<td><img class="p-3" alt=""
						src="{{asset('assets/reports/imgs/Background (9).png')}}"></td>
				</tr>
			</tbody>
		</table>
	</div>
	
	<div class="page-break"></div>
	
	<div class="card header-spacing">
		<div class="card-header bg-secondary text-white fs-3 fw-bloder">
			Strategies for Success with {{$template->horsename}}</div>
	</div>

	<div class="inner-page pg-9">	
		<table>
			<tbody>
				<tr>
					<td class="w-50 paragraph-spacing line-height-1-5">
						<h3 class="">Communication, Exercise and Development</h3>
						<div>Think of your plan for creating harmony with
							{{$template->horsename}} as having two parts:</div>
						<ol>
							<li>First, identify strategies for dealing with
								{{$template->pronoun['his-her-H']}} core Horsenality
								Type...deal with the 'Big Dot' first.</li>
							<li>Next, develop a game plan for coping with behaviors that show
								up in certain situations but not necessarily all the time.
								Sometimes you even have to deal with these immediately for safety
								reasons or to help {{$template->horsename}} get into a learning
								state of mind.</li>
						</ol>
						<div>You'll be surprised to find that the sooner you address
							{{$template->pronoun['his-her-H']}} problematic behavior
							and do the appropriate thing, the fewer issues you will have.</div>
						<div>So let's get started with {{$template->horsename}}'s "Big
							Dot" and identify the general strategies to use to help
							{{$template->pronoun['him-her-H']}} become more
							'centered' and</div>
					</td>
					<td class="w-50""><img class="w-100 pg-9-image" alt=""
						src="{{asset('assets/reports/imgs/Background (10).png')}}"></td>
				</tr>
			</tbody>
		</table>

		<table class="my-5">
			<tbody>
				<tr>
					<td>
						<h3>Help {{$template->horsename}} go from this...</h3>
						<div>
							<img class="w-75" alt=""
								src="{{asset('assets/img/RBEX_after.jpg')}}">
						</div>
					</td>
					<td>
						<h3>to this!</h3>
						<div>
							<img class="w-75" alt=""
								src="{{asset('assets/img/RBEX_before.jpg')}}">
						</div>
					</td>
				</tr>
			</tbody>
		</table>
	</div>

	<div class="page-break"></div>
	<div class="card header-spacing">
		<div class="card-header bg-secondary text-white fs-3 fw-bloder">
			Understanding {{$template->horsename}}'s Nature</div>
	</div>
	<div class="inner-page">
		<div>{!! $template->statement['[H-Nature]'] !!}</div>
		<div>
			For <strong>specific exercises,</strong> use the Patterns found in the
			Four Savvys DVD Packs. More on this in the next section.
		</div>
	</div>

	<div class="page-break"></div>
		<div class="card header-spacing">
			<div class="card-header bg-secondary text-white fs-3 fw-bloder">Do's
				and Don'ts for {{$template->horsename}}</div>
		</div>

	<div class="inner-page pg-9">
		<div class="my-3">{!! $template->statement['[H-Introduction]'] !!}</div>
		<div class="w-100">
			<table class="table">
				<tbody class="table borderless line-height-1-5">
					<tr>
						<td class="w-30 padding-25"><img class="p-4 w-70" alt=""
							src="{{asset('assets/reports/imgs/Background (11).png')}}">

							<div>
								<strong class="large-text">Do</strong><br>These are good things to learn and
								remember so that when {{$template->horsename}} has trouble you
								can do exactly the right thing, right away.
							</div></td>
						<td class="w-75"><strong class="larger-text">Do's</strong>
							<div>{!! $template->statement['[H-Do\'s]'] !!}</div></td>
					</tr>
				</tbody>
			</table>
		</div>
		
		<div class="page-break"></div>

		<div class="w-100">

			<table class="table">
				<tbody class="table borderless line-height-1-5">
					<tr>
						<td class="w-30 padding-25"><img class="w-100" alt=""
							src="{{asset('assets/reports/imgs/Background (12).png')}}">

							<div>
								<strong class="large-text">Don't</strong><br> These are the things to avoid because
								they will cause {{$template->horsename}} to become more upset
								and afraid of you. When {{ $template->pronoun['he-she-H'] }} trusts you as {{ $template->pronoun['his-her-H'] }} leader {{ $template->pronoun['he-she-H'] }} will become less affected by what goes on
								around {{ $template->pronoun['him-her-H'] }}. You see,
								it's not about the weather, the spooky object, the jump, the
								barrels, the trail ride, the other horses, etc...it's about the
								relationship {{$template->horsename}} has with you. When you
								become the leader {{$template->pronoun['he-she-H']}}
								needs, {{$template->pronoun['he-she-H']}} will feel
								calm and safe with you no matter what you are doing or where you
								are.
							</div></td>
						<td class="w-75"><strong class="larger-text">Don'ts</strong><br>{!! $template->statement['[H-Don\'ts]'] !!}</td>
					</tr>
				</tbody>
			</table>
		</div>
	</div>

	<div class="page-break"></div>
	<div class="card header-spacing">
		<div class="card-header bg-secondary text-white fs-3 fw-bloder">
			Powerful Communication Keys</div>
	</div>
	<div class="inner-page">
		<!-- 			<div class="card-body"> -->
		<div class="text-center margin-auto my-2 fw-bolder">
			How do you tell your horse to calm down? How can you motivate
				{{$template->pronoun['him-her-H']}}?<br>How do you communicate
				what it is you want {{$template->pronoun['him-her-H']}} to
				do?<br>What is your common language?
		</div>
		<div class="my-5">Most people will tell you to hold your horse close,
			to say 'whoa' or 'quit' when {{$template->pronoun['he-she-H']}} misbehaves, to kick to go and pull on the reins
			to stop. But nothing could be more confusing and unsettling for a
			horse than this. Horses are highly perceptive, sensitive animals and
			very fast learners unless they are confused or scared. What you need
			is a language that makes sense to horses and makes it possible for you
			to communicate better (as horses do) and be understood.</div>
		<div>The Parelli Seven Games take the mystery out of communicating with
			horses because it is based on how horses communicate with each
			other...through body language. The first game, the Friendly Game,
			builds trust and rapport. The other six games form the origin of every
			maneuver you might wish to teach your horse, from basic to very
			advanced. This means every single thing you wish to teach your horse
			or communicate to {{$template->pronoun['him-her-H']}} can be
			constructed from the Seven Games.</div>
		<div class="row w-100 my-5">
			<table class="table borderless line-height-1-5">
				<tbody>
					<tr>
						<td class="w-50 paragraph-spacing"><div>When you watch horses interacting and playing
								with each other you will see them use every one of the Seven
								Games.</div>
							<div>Horses are different from humans. They are prey animals and
								we are predators, but they are also herd animals so having a
								pecking order is an important part of their herd structure. They
								have an intense need to know who is dominant and interestingly,
								they jostle for dominance over each other constantly. This is
								important for you to know because you will have to play that game
								also. Every time you interact with your horse, you have to act
								like a leader and be consistent in setting your boundaries and
								communicating your expectations. You need to be prepared and
								define the relationship. If you don't, your horse will!</div></td>
						<td class="w-50"><img class="w-100" alt=""
							src="{{asset('assets/reports/imgs/Background (13).png')}}"></td>
					</tr>
				</tbody>
			</table>
		</div>

		<div class="page-break"></div>
		<div class="my-5">
			<h3>The Seven Games</h3>
			<div class="text-muted">Pat Parelli has titled the Seven Games with
				terms that will help you remember their action and purpose. Memorize
				them in order and then learn how to use them naturally in your
				day-to-day interactions with {{$template->horsename}}. These games
				are the basis of your language; they are the alphabet and primary
				words from which you will build sentences and stories that allow you
				to have interesting 'conversations' with {{$template->horsename}}.
				This is way more than training!</div>
			<ol class="seven-games-list">
				<li><span>The Friendly Game</span> builds trust and confidence. It is
					the most important game to play with horses that are tense and
					skeptical in order to convince the prey animal in them that you are
					not going to hurt or kill them.</li>
				<li><span>The Porcupine Game</span> teaches horses to yield from
					steady pressure. Use it when leading, backing up, or directing
					horses away from you. When riding, use it to get responses to rein
					and leg pressure.</li>
				<li><span>The Driving Game</span> teaches horses to yield from
					gestures and rhythmic pressure so you can move them without touching
					them. You can use this game to defend your personal space - very
					important! When you're in the saddle, you can play this game when
					with one rein, with your feet for a back up, to change your energy,
					and when riding with Carrot Sticks.</li>
				<li><span>The Yo-Yo Game</span> equalizes backward-and-forward
					tendencies in horses (most horses prefer forward movement). And, a
					big bonus, it develops straightness. It's a key part of transitions
					and promotes engagement of the hindquarters. On the ground it keeps
					horses out of your space.</li>
				<li><span>The Circling Game</span> sends the horse around you and
					teaches them to come back to you. It also teaches them the
					responsibility of continuing to circle you without being reminded.</li>
				<li><span>The Sideways Game</span> develops the skill of moving
					sideways. This is important for everyday things like opening gates,
					all the way up to building suspension for lead changes and lateral
					maneuvers.</li>
				<li><span>The Squeeze Game</span> teaches horses to overcome their
					fear of small or narrow spaces. This is valuable for things like
					wash racks, horse trailers, racing gates, veterinary stocks, gates
					and narrow passageways, as well as jumps, bridges, etc. The Squeeze
					Game is calming for horses and helps them overcome their natural
					claustrophobic tendencies.</li>
			</ol>

			<div>Every maneuver, no matter how simple or advanced, is made up of
				one or more of the Seven Games.</div>
			<div>If you are not familiar with the Parelli Seven Games, start with
				the Parelli Savvy Club- essential skills for safety, confidence, and
				fun, on the ground and riding. The Seven Games will make a HUGE
				difference to your success with {{$template->horsename}} and with
				horses in general, because they truly are the language of horses,
				decoded for humans.</div>
		</div>
		
		<div class="page-break"></div>
		<div class="my-5">
			<h3>Playing the Seven Games with {{$template->horsename}}</h3>
			<div>Here are some predictable behaviors and reactions you may
				experience as you learn to communicate with {{$template->horsename}}
				using the Seven Games. Some things will be easier for
				{{$template->horsename}} and others will be harder, but in the end
				the goal is to have it all balance out. Knowing what to expect based
				on {{$template->horsename}}'s Horsenality Type will give you more
				understanding of why it is happening and prepare you to be more
				patient and effective.</div>
		</div>
		<div class="my-5">

			<table class="table borderless">
				<tbody>
					<tr>
						<td><img class="" style="height: 1000px;" alt=""
							src="{{asset('assets/reports/imgs/Background (14).png')}}"> <img
							class="" style="height: 1000px;" alt=""
							src="{{asset('assets/reports/imgs/Background (15).png')}}"></td>
						<td>
							<h4>THE SEVEN GAMES</h4>
							<div>{!! $template->statement['[H-Seven-Games]'] !!}</div>
						</td>
					</tr>
				</tbody>
			</table>
		</div>

		<div class="my-5">
			<div class="w-100 my-4">
				<table class="table borderless">
					<tbody>
						<tr>
							<td class="hand-writing paragraph-spacing line-height-1-5">
								<div>We really want to stress that the Seven Games are the
									language; they aren't exercises in and of themselves. Does this
									make sense? If all you do is the Seven Games, over and over, it
									will turn them into the Seven Jobs!</div>
								<div>The Seven Games help you convey to your horse what you want
									{{$template->pronoun['him-her-H']}} to do...to move
									away from your touch, or to calm down and stand still, to move
									over, go forwards, back up, come to you, make transitions,
									turn...whether you are on the ground or on {{$template->pronoun['his-her-H']}} back. It will help you figure out what
									aspect of a maneuver is not working when you have trouble
									getting your horse to do something.</div>
								<div>Think of the Seven Games as the ingredients. The next
									section is about the exercises to do with
									{{$template->horsename}} on a regular basis that help you
									develop and advance {{$template->pronoun['his-her-H']}} skills: Patterns, both on the ground and
									in the saddle.</div>
							</td>
							<td class="w-50"><img class="w-100" alt=""
								src="{{asset('assets/reports/imgs/Background (16).png')}}"></td>
						</tr>
					</tbody>
				</table>
			</div>
		</div>
		<!-- 			</div> -->
		<!-- 		</div> -->
	</div>

	<div class="page-break"></div>
	<div class="card header-spacing">
		<div class="card-header bg-secondary text-white fs-3 fw-bloder">
			Constructive Exercises for Success and Advancement</div>
	</div>
	<div class="inner-page paragraph-spacing">
		<div>As a leader you need to have a plan for your activities with your
			horse. Your horse depends on you for this. Behavioral issues arise
			when your horse is not getting enough mental, emotional and physical
			exercise, or {{$template->pronoun['he-she-H']}} isn't
			getting the kind of leadership {{$template->pronoun['he-she-H']}} needs.</div>
		<div>We have developed a specific set of Patterns to you to implement
			with your horse. Not only do they give you a plan, they give you
			constructive exercises that cause your horse to participate on every
			level - mentally, emotionally and physically. They give you the
			opportunity to have 'conversations' and real communication rather than
			micromanaging your horse like a puppet and not allowing
			{{$template->pronoun['him-her-H']}} to think. You will have
			a simple yet brilliant training plan that steadily advances you both.
			This is how we develop our horses; it's our blueprint for a solid
			foundation.</div>
		<div>The Patterns will help you put a good foundation on your horse and
			they automatically give you the leadership skills your horse needs.</div>
		<div>The Parelli approach to horsemanship encourages developing the
			relationship first on the ground, ensuring you have trust and
			communication before mounting to ride. Many problems can be solved
			simply by adopting this more savvy way of preparing horses...we call
			it the Pre-Ride Check, but playing with horses on the ground can also
			be taken to an art form.</div>
		<div class="w-100 my-5">
			<table class="table borderless">
				<tbody>
					<tr>
						<td class="">
							<div class="text-muted line-height-1-5">
								<div class="hand-writing">The unique thing about this program is
									that there are four main areas you need to become skilled with
									horses...I call them The Four Savvys. There are two on the
									ground, and two riding:</div>
								<ol class="list-spacing fw-bolder">
									<li>On Line - with a halter and line attached</li>
									<li>Liberty - with no line, starting in a round corral</li>
									<li>FreeStyle - riding without contact</li>
									<li>Finesse - riding with contact and precision</li>
								</ol>
								<div class="hand-writing">By learning how to "play" with your
									horse in each of the Four Savvys you develop real savvy, a very
									well rounded set of skills. Even if you don't ride, you can play
									with your horse on the ground with On Line and Liberty. That's
									why we have organized our definitive core product series - The
									Four Savvys - based on this model. You can focus on whichever
									Savvy appeals to you, and develop your horsemanship at your own
									pace!</div>
							</div>
						</td>
						<td class="w-25"><img class="w-100" alt=""
							src="{{asset('assets/reports/imgs/Background (17).png')}}"></td>
					</tr>
				</tbody>
			</table>
		</div>
	</div>

	<div class="card header-spacing">
		<div class="card-header bg-secondary text-white fs-3 fw-bloder">The
			Right Balance between Variety and Consistency</div>
	</div>
	<div class="inner-page pg-12">
		<div>All horses need the right balance of consistency to help them gain
			confidence and variety to keep them stimulated and learning. The Seven
			Games help you understand how to 'talk' to {{$template->horsename}}
			and how to direct {{$template->pronoun['him-her-H']}}. The
			Parelli Patterns give you the exercises to do with
			{{$template->pronoun['him-her-H']}} to develop your
			partnership and methodically advance your skills together.</div>
		<table class="table borderless">
			<tbody>
				<tr>
					<td class=""><div class="line-height-1-5">
							<h3>Best Games and Patterns for {{$template->horsename}}</h3>
							
							<div>
								@if( is_array( $template->statement['[H-Games-Patterns]'] ) > 1 )
    								@foreach($template->statement['[H-Games-Patterns]'] as $v)
    									{{ $v }}<br><br>
    								@endforeach
    							@else
    								{!! $template->statement['[H-Games-Patterns]'] !!}
								@endif
							</div>
							
							<div>{!! $template->statement['[H-Pat-Balance]'] !!}</div>
						</div></td>
					<td class=""><img class="" alt=""
						src="{{asset('assets/reports/imgs/Background (17).png')}}"></td>
				</tr>
			</tbody>
		</table>
	</div>

	<div class="page-break"></div>
	<div class="card header-spacing">
		<div class="card-header bg-secondary text-white fs-3 fw-bloder">
			Designing Your Session with {{$template->horsename}}</div>
	</div>
	<div class="inner-page">
		<h3>Here's how a session with you and {{$template->horsename}} might
			look:</h3>
		<div>{!! $template->statement['[H-Session]'] !!}</div>

		<div class="w-100 my-5">

			<table class="table borderless">
				<tbody>
					<tr>
						<td class=""><div class="text-muted line-height-1-5">
								<h3>Know when to quit:</h3>
								<div>{!! $template->statement['[H-Pat-Quit]'] !!}</div>
							</div></td>
						<td class="w-25"><img class="w-100" alt=""
							src="{{asset('assets/reports/imgs/Background (17).png')}}"></td>
					</tr>
				</tbody>
			</table>
		</div>

		<div class="w-100 my-5">

			<table class="table borderless">
				<tbody>
					<tr>
						<td class=""><img class="" alt=""
							src="{{asset('assets/reports/imgs/Background (18).png')}}"></td>
						<td class=""><div class="text-muted line-height-1-5">
								<div>{!! $template->statement['[H-Take-Care]'] !!}</div>
							</div></td>
					</tr>
				</tbody>
			</table>


		</div>

		<div>The next session will give you some tips on handling some of
			{{$template->horsename}}'s specific behaviors that tend to come up in
			different situations.</div>
	</div>

	<div class="page-break"></div>
	<div class="card header-spacing">
		<div class="card-header bg-secondary text-white fs-3 fw-bloder">
			Situation-Specific Behavior</div>
	</div>
	<div class="inner-page pg-14">
		<div>The chart below provides more details about
			{{$template->horsename}}'s behavior. Regardless of
			{{$template->horsename}}'s primary Horsenality Type and the quadrant
			{{$template->pronoun['his-her-H']}} "big dot" falls, you may
			find that certain behaviors crop up on other parts of the chart. In
			fact, the more quadrants in which these dots appear, the more
			complicated {{$template->pronoun['he-she-H']}} is. Here's
			the good news...if you can quickly adjust to handle the new behavior,
			you will find that they come up less and less. Many people have the
			tendency to ignore what's happening, or they feel frustrated and
			punish the horse because they see it as disobedience rather than
			something that has come up for good reason. You don't necessarily need
			to know why it occurred, but you do need to know what to do about it
			and then do it immediately to help {{$template->horsename}} get more
			balanced again.</div>

		<div class="w-100 my-5">
			<img class="graph-image" alt="" src="{{$template->graph['Horsenality-Detail-Rating-Graph']['path']}}">
		</div>


		<div class="page-break"></div>
		<div class="w-100 my-5">

			<table class="table borderless">
				<tbody>
					<tr>
						<td class=""><div class="text-muted paragraph-spacing line-height-1-5">
								<h3>Pat's Horsenality Tip</h3>

								<div>Most horses tend to load up on one primary quadrant, but
									certain situations or past baggage can cause a horse to display
									behaviors that are more typical of a different Horsenality.</div>
								<div>Think of these as the individuating characteristics of a
									horse.</div>
								<div>Even though there are four main Horsenality Types, each
									horse is an individual because of the little dots that accompany
									it.</div>
								<div>Pay particular attention to any scores that are extreme
									because it will mean you need to take more time to solve it, or
									improve your own skills so you are able to do it yourself. You
									might even need professional help from one of Parelli's highly
									trained Instructors. Don't be too proud to ask; that's what our
									team is here for! We coach and advise each other all the time.
									That's how we continue to learn and it is just one of the many
									wonderful things that have grown from our Parelli Professional
									training program.</div>
								<div>On the next page you'll find training guidelines for some of
									{{$template->horsename}}'s more extreme situational behaviors.</div>
							</div></td>
						<td class=""><img alt=""
							src="{{asset('assets/reports/imgs/Background (17).png')}}"></td>
					</tr>
				</tbody>
			</table>
		</div>
	</div>

	<div class="page-break"></div>
	<div class="card header-spacing">
		<div class="card-header bg-secondary text-white fs-3 fw-bloder">Adjust
			to Fit the Changing Situation</div>
	</div>
	<div class="inner-page">
		<div class="w-100 my-5">

			<table class="table borderless">
				<tbody>
					<tr>
						<td class=""><img class="" alt=""
							src="{{asset('assets/reports/imgs/Background (19).png')}}"></td>
						<td class=""><div class="w-100 float-end ps-5 paragraph-spacing text-muted line-height-1-5">
								<div>Over the years, many people have told me that their horse
									completely changes when moving from groundwork to riding, going
									from the arena to a trail, moving to a new place, or when the
									weather changes or when surrounded by other horses. This is what
									I call 'situational' because when the situation changes the
									horse changes.</div>
								<div>The goal is for your relationship to become so strong that
									even though the things around you and your horse might change,
									the relationship between you and your horse doesn't; so wherever
									{{$template->horsename}} is, as long as {{$template->pronoun['he-she-H']}}'s with you, {{$template->pronoun['his-her-H']}} behavior will remain consistent.</div>
								<div>Now, don't expect all the problematic behaviors to be gone
									in a week or two. It will be a process where things just keep on
									improving until one day you simply don't have these issues
									anymore.</div>
								<div>I recommend that you re-chart {{$template->horsename}}
									every six months, certainly every twelve months at a minimum.
									It's most gratifying to see the changes that
									{{$template->pronoun['he-she-H']}} has made reflected
									on {{$template->pronoun['his-her-H']}} Horsenality
									Profile, and this helps you adjust your own approach
									accordingly.</div>
								<div>A major goal of development is to move
									{{$template->horsename}}'s extreme behaviors toward the center
									of the chart. This makes {{$template->pronoun['him-her-H']}} easier to play with and teach; even more
									importantly, it makes {{$template->pronoun['his-her-H']}} life less stressful. This is because many
									of {{$template->horsename}}'s erratic and extreme behaviors may
									be learned reactions caused by stress. Reducing or eliminating
									these will help {{$template->pronoun['him-her-H']}}
									become more relaxed and centered {{$template->pronoun['himself-herself-H']}} .</div>
								<div>The sooner you can provide what {{$template->horsename}}
									needs, the sooner the problems will diminish and ultimately
									disappear. Just remember, the more damaged
									{{$template->horsename}} is and the longer {{$template->pronoun['he-she-H']}}'s had these issues, the longer it will
									take to change them. But, be patient and consistent,
									{{$template->pronoun['he-she-H']}} needs your
									leadership in order to become more centered on a consistent
									basis.</div>

							</div></td>
					</tr>
				</tbody>
			</table>


		</div>
		
		<div class="page-break"></div>
		<div class="mw-100 my-5">
			<h3 class="my-5 w-100">Situational Behaviors:</h3>
			<div>
				@if( is_array( $template->statement['[H-Situational-Behaviors]'] ) )
					@foreach($template->statement['[H-Situational-Behaviors]'] as $v)
						{!! $v !!}<br><br>
					@endforeach
				@else
					{!! $template->statement['[H-Situational-Behaviors]'] !!}
				@endif
			</div>
		</div>
	</div>

	<div class="page-break"></div>
	<div class="card header-spacing">
		<div class="card-header bg-secondary text-white fs-3 fw-bloder">
			Strengths, Positive Characteristics and Aptitudes</div>
	</div>
	<div class="inner-page pg-16">
		<div class="w-100 my-5">

			<table class="table borderless">
				<tbody>
					<tr>
						<td class=""><div class="text-muted paragraph-spacing line-height-1-5">
								<div>Just like people, horses have their strengths and
									weaknesses. We've given you a lot of information and direction
									to help you with the issues {{$template->horsename}} has, but
									it's important to know what {{$template->pronoun['he-she-H']}} is going to be like once
									{{$template->pronoun['he-she-H']}} is emotionally
									balanced and centered.</div>
								<div>Knowing who the real horse is inside will help you bring
									that out in {{$template->horsename}} and having an idea of what
									{{$template->pronoun['he-she-H']}} might be most
									suitable for will also serve as a good guide. Sometimes people
									discover they have bought the wrong horse for the goal or
									activity they have in mind and this is the problem, not the
									horse. In this situation you either have to change your goal, or
									learn what it takes to have your horse like it as much as you
									do. There is always the possibility that you might decide to
									match {{$template->horsename}} up with someone who wants to do
									what {{$template->pronoun['he-she-H']}} is designed
									for while you pursue your perfect match in another horse.</div>
							</div></td>
						<td class="w-25"><img class="w-100" alt=""
							src="{{asset('assets/reports/imgs/Background (19).png')}}"></td>
					</tr>
				</tbody>
			</table>


		</div>
		<div class="row w-100 my-5 py-5">
			<div class="">
				<div class="mb-50">Let's look again at {{$template->horsename}}'s overall
					Horsenality Type. Here's {{$template->pronoun['his-her-H']}} chart and a list of some of
					{{$template->pronoun['his-her-H']}} strengths.</div>

				<table class="table chart-spacing borderless">
					<tbody>
						<tr>
							<td class="w-70"><img alt="" class="w-100"
								src="{{$template->graph['Horsenality-Detail-Rating-Graph']['path']}}"></td>
							<td class="bg-secondary text-white">{!! $template->statement['[H-Strengths-Bullets]'] !!}</td>
						</tr>
					</tbody>
				</table>
			</div>
		</div>
		<div class="row">{!! $template->statement['[H-Aptitude-Challenges]'] !!}</div>
		<div class="row w-100 py-5">

			<table class="table borderless">
				<tbody>
					<tr>
						<td class=""><img class="" alt=""
							src="{{asset('assets/reports/imgs/Background (20).png')}}"></td>
						<td class=""><span class="text-muted line-height-1-5">{!! $template->statement['[H-Pat-Strengths]'] !!}</span></td>
					</tr>
				</tbody>
			</table>

		</div>
	</div>

	<div class="page-break"></div>
	<div class="card header-spacing">
		<div class="card-header bg-secondary text-white fs-3 fw-bloder">
			Resources and More</div>
	</div>
	<div class="inner-page">
		<div class="row w-100 my-5">
			<table class="table borderless">
				<tbody>
					<tr>
						<td class="w-30"><img class="w-100" alt=""
							src="{{asset('assets/reports/imgs/Background (21).png')}}"></td>
						<td class=""><div class="text-muted paragraph-spacing line-height-1-5">
								<h3>The Horsenality/Humanality Match Report</h3>
								<div class="text-muted">Check out how your Humanality and your
									horse's Horsenality match or mismatch!</div>
								<div>Once you've identified your horse's Horsenality, your next
									step towards gaining a deeper understanding of horse behavior
									and improving your partnership with your horse is taking the
									Horsenality/Humanality Match Report. This report will assess
									your personality, link your Humanality back to your horse's
									Horsenality, and illustrate how the two of you can bring out the
									best in each other!</div>
								<div>With the Match Report, you'll learn how to overcome common
									training challenges that occur due to your
									Horsenality/Humanality differences, and you'll receive
									customized guidelines that tell you how to flex your style in
									order to be more successful with your horse. Parelli Natural
									Horsemanship collaborated with Dr. Patrick Handley, PhD - an
									expert in personality assessment - to create this expansive,
									comprehensive report that provides revealing insights on your
									personality strengths and weaknesses, and how they will affect
									your partnership with your horse.</div>
								<div>When Pat is asked which Humanality matches best with a
									certain Horsenality, his answer is always simply "a horseman."
									There is no perfect recipe for a horse/human partnership, but
									with resources like the Horsenality/Humanality Match Report, you
									will take a huge step towards developing true harmony with your
									horse, no matter your differences.</div>
							</div></td>
					</tr>
				</tbody>
			</table>
		</div>

		<div class="page-break"></div>

		<div class="w-100 my-5">
			<table class="table borderless">
				<tbody>
					<tr>
						<td class=""><div class="text-muted paragraph-spacing line-height-1-5">
								<h3>Got Multiple Horses? Get Multiple Reports!</h3>
								<div>I have many horses, each of whom showcase very different Horsenalities. I understand the importance of truly getting to know each horse on their own terms, and that's why I encourage multiple-horse owners to fill out a Horsenality Report for each of their horses. In doing so, you'll gain invaluable information on how to partner best with each horse - you'll literally compile an owner's manual on each of your horses!</div>
							</div></td>
						<td class="w-30"><img class="w-100" alt=""
							src="{{asset('assets/reports/imgs/Background (22).png')}}"></td>
					</tr>
				</tbody>
			</table>
		</div>

		<div class="page-break"></div>
		
		<div class="w-100 my-5">

			<table class="table borderless">
				<tbody>
					<tr>
						<td class=""><img class="" alt=""
							src="{{asset('assets/reports/imgs/Background (19).png')}}"></td>
						<td class=""><div class="w-100 float-end ps-5 paragraph-spacing text-muted line-height-1-5">
                			<h3>The Parelli Four Savvys Program</h3>
                			<div>Pat has identified four "ways" of playing with horses, four areas
                				in which a horse and human can learn from one another. He dubbed
                				these areas "the Four Savvys." Together they form the blueprint for
                				you as a horseman, and for the Parelli Program as a whole.</div>
                			<h4>There are two Savvys on the ground:</h4>
                			<div>
                				<h4 class="px-5">On Line</h4>
                				<div class="px-5">This foundational Savvy takes place on the ground,
                					using a halter and ropes of varying lengths as a safety net while
                					you are learning to communicate in your horse's language. Here, you
                					will learn how to play the Seven Games.</div>
                			</div>
                			<div>
                				<h4 class="px-5">Liberty</h4>
                				<div class="px-5">What if you could communicate with your horse
                					without any ropes at all? In Liberty, you'll learn how to interact
                					with horses when they are free, whether in a stall, pasture, in the
                					wild... or in a round corral. From catching to developing high-level
                					maneuvers like flying changes, this Savvy is all about building a
                					bond stronger than any lead rope, and mastering your own emerging
                					horse behavior skills.</div>
                			</div>
                			<h4>And there are two Savvys in the saddle:</h4>
                			<div>
                				<h4 class="px-5">FreeStyle</h4>
                				<div class="px-5">Riding on loose reins is how you teach horses to
                					relax and teach riders to have a truly independent seat. FreeStyle
                					riding builds confidence and "responsibility" in the horse, where he
                					learns to really act as a partner instead of a robot. The rider
                					learns how to balance without hanging on the reins or gripping with
                					their legs. At its highest level, you will be able to ride bareback
                					and bridleless with confidence and ease.</div>
                			</div>
                			<div>
                				<h4 class="px-5">Finesse</h4>
                				<div class="px-5">Finesse is about ultimate refinement. It
                					encompasses riding close to your horse, with concentrated reins,
                					with a soft, polite and willing feel, and with vertical flexion. You
                					learn how to improve your posture, to be more fluid, and have your
                					horse become rounder, more collected and elegant.</div>
                			</div>
                            <div>When I go to play with my horse, sometimes I only play on the
                				ground - mostly at Liberty these days, unless I take him jumping logs
                				and moving out in the playground, but mostly I ride. So I'm playing
                				in two or three Savvys sometimes. It makes it more interesting, and I
                				tend to get more creative and thoughtful about what I'm doing and
                				where I'm going with my horse as we advance. And now that I'm
                				studying the art of riding with precision with dressage master Walter
                				Zettl, I find it more important than ever to keep a balance in the
                				Four Savvys, rather than becoming overly focused on Finesse.</div>
                			<div>Many times, people will want to start at the top with the most
                				challenging things, but that doesn't always lead to putting the horse
                				first. I think Pat has organized the Savvys in such a way that it
                				encourages people to get the fundamentals down first. Once you've got
                				a solid foundation, you start making incredible progress, and that's
                				when the real fun begins! If you want to become a horseman, that's
                				the way to do it!</div>
                			<h3>Parelli Professionals</h3>
                			<div>Parelli Instructors (officially known as Parelli Professionals)
                				are talented, dedicated Parelli students who have been certified to
                				teach the Parelli Program out in the field. Instructors can give
                				one-on-one horsemanship lessons, lead group lessons and clinics, and
                				more. As an Instructor gains experience and skill, their "star
                				rating" increases, which allows them to teach more Savvys at higher
                				levels.</div>
                			<div>There are Parelli Professionals available throughout the world
                				offering natural horsemanship training in a number of different
                				formats. Educational formats include coaching, private lessons, group
                				lessons, half-day or full-day clinics, workshops focusing on a
                				particular skill, and multi-day camps.</div>
                			<h3>Savvy Club Membership</h3>
                			<div>The Parelli Savvy Club is a worldwide membership community that
                				gives you access to the Levels Program (Levels 1-4), thousands of
                				educational videos and articles, and presents opportunities to
                				interact with other like-minded horse enthusiasts, develop your
                				confidence and overcome fears, solve horse behavior problems and
                				discipline issues, connect with Pat Parelli, ask questions, and get
                				support to becoming a better horseman.</div>
                			<h3>Parelli Courses Around the World</h3>
                			<div>When you're ready to immerse yourself in the ultimate educational
                				horsemanship experience, we encourage you to take a course at one of
                				our Parelli campuses around the world. Courses are led by talented
                				Parelli Professionals and give students the opportunity to delve into
                				a specific topic or Savvy for a week or more. Visit www.parelli.com
                				to learn more about courses and how to apply!</div>
                			<div>{!! $template->statement['[H-Cusp-Supplement]'] !!}</div>
						</td>
					</tr>
				</tbody>
			</table>
		</div>
	</div>
</body>
</html>