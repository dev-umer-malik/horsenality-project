<!DOCTYPE html>
<html>

<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Horsenality Report</title>
<link rel="stylesheet"
	href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css"
	integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm"
	crossorigin="anonymous">

<style>
.page-break {
	page-break-after: always;
}

@media print {
	.noprint {
		display: none;
	}
}
</style>
</head>
<body>
	<div class="container-fluid my-5">
		<img alt="" class="w-100"
			src="{{asset('assets/reports/imgs/Background (23).png')}}">
		<h1 class=text-center>For MERGEFIELD</h1>
		<h1 class="text-center">[Horse Name] ([{{$template->horse_name}}])</h1>
		<h6 class="card-subtitle mb-2 text-muted">Based on data provided by
			MERGEFIELD [Firstname-R] ([{{$template->Firstname_r}}]) MERGEFIELD
			[Lastname-R] ([{{$template->Lastname_r}}]) MERGEFIELD
			[Assessment-date] ([{{$template->assessment_date}}])</h6>

		<div class="page-break"></div>
		<div class="card my-5">
			<div class="card-header bg-secondary text-white fs-3 fw-bloder">Your
				Customized Horsenality Report</div>
			<div class="card-body">
				<div class="row">
					<table>
						<tbody>
							<tr>
								<td class="w-50">
									<div>Dear {{$template->Firstname_r}},</div>
									<div>You have taken an important step in deeply understanding
										your horse, {{$template->horse_name}}.</div>
									<div>As you learn more about {{$template->horse_name}}'s
										Horsenality you'll be empowered to bring out the best in
										{{($template->gender == 'male')?'him':'hy'}} and avoid doing
										the things that unintentionally cause {{($template->gender ==
										'male')?'him':'hy'}} trouble or confusion.</div>
								</td>
								<td class="w-50"><img class="w-100"
									src="{{asset('assets/reports/imgs/Background (2).png')}}" /></td>
							</tr>
						</tbody>
					</table>
				</div>
				<div class="">
					<div class="">
						{{$template->horse_name}}'s Horsenality is made up of four things:

						<ul>
							<li>Innate Characteristics - what {{($template->gender ==
								'male')?'he':'she'}} was born with.</li>
							<li>Learned Behavior Learned Behavio the good and the undesirable
								experiences in {{($template->gender == 'male')?'his':'her'}}
								past!</li>
							<li>Environment - the herd, the training, the demands, the sights
								and sounds.</li>
							<li>Spirit - the level of intensity {{($template->gender ==
								'male')?'he':'she'}} expresses {{($template->gender ==
								'male')?'himself':'herself'}} with: mild, moderate, extreme.</li>
						</ul>
					</div>
					<div class="">
						<div>What you are going to learn about in this report is the
							behavioral part. You don't even need to know why it's happening
							as much as what to do when it happens. This alone will reshape
							{{$template->horse_name}}'s behavior, encouraging emotional
							balance, self-confidence and trust in you as {{($template->gender
							== 'male')?'his':'her'}} leader.</div>
						<div>It is my pleasure to be your personal guide. I'll help you
							understand what's going on with {{$template->horse_name}} and
							advise you on the most effective ways to exercise and teach
							{{($template->gender == 'male')?'him':'hy'}}. I believe in
							putting the relationship first which means preserving the trust
							and enhancing the motivation for {{$template->horse_name}} to be
							with you and to give you {{($template->gender ==
							'male')?'his':'her'}} all, no matter what your goals are...from
							recreation to performance.</div>
						<div>Just as {{$template->horse_name}} can be your dream horse,
							you will learn how to be {{($template->gender ==
							'male')?'his':'her'}} dream partner</div>
						<div>Yours Naturally,</div>
					</div>

					<div class="">
						<img alt="" class=""
							src="{{asset('assets/reports/imgs/Background (24).png')}}"><br>
						Pat Parelli
					</div>
				</div>
			</div>
		</div>

		<div class="page-break"></div>
		<div class="card my-5">
			<div class="card-header bg-secondary text-white fs-3 fw-bloder">Report
				Contents</div>
			<div class="card-body">

				<div class="text-muted">PART 1</div>
				<div>The Parelli Horsenality Profile</div>

				<div class="text-muted">PART 2</div>
				<div>The Four Horsenality Types</div>

				<div class="text-muted">PART 3</div>
				<div>{{$template->horse_name}}'s Horsenality Type</div>

				<div class="text-muted">PART 4</div>
				<div>Strategies for Success with {{$template->horse_name}}</div>

				<div class="text-muted">PART 5</div>
				<div>Do's and Don'ts for {{$template->horse_name}}</div>

				<div class="text-muted">PART 6</div>
				<div>Powerful Communication Keys</div>

				<div class="text-muted">PART 7</div>
				<div>Constructive Exercises for Success and Advancement</div>

				<div class="text-muted">PART 8</div>
				<div>The Right Balance between Variety and Consistency</div>

				<div class="text-muted">PART 9</div>
				<div>Design your Session for {{$template->horse_name}}</div>

				<div class="text-muted">PART 10</div>
				<div>Situation-Specific Behaviors</div>

				<div class="text-muted">PART 11</div>
				<div>Adjust to fit the Changing Situation</div>

				<div class="text-muted">PART 12</div>
				<div>Strengths, Positive Characteristics, and Aptitudes</div>

				<div>PART 13</div>
				<div>Resources and More</div>

			</div>
		</div>

		<div class="page-break"></div>
		<div class="card my-5">
			<div class="card-header bg-secondary text-white fs-3 fw-bloder">The
				Parelli Horsenality Profile</div>
			<div class="card-body">
				<div>Just as people have different personalities, horses have
					different Horsenalities. By completing the online assessment
					questionnaire, you have provided information that makes it possible
					for us to scientifically chart {{$template->horse_name}} and
					determine {{($template->gender == 'male')?'his':'her'}} Horsenality
					Profile.</div>
				<div>This section will tell you how we've done that. You'll gain a
					better understanding of the four Horsenality Types and the unique
					behaviors that pinpoint a horse's individual character.</div>
				<h3>The Four Horsenality Types</h3>
				<div>Horses tend to fall into one of four primary types. These are
					made up of combinations of Extrovert or Introvert, and Right-Brain
					(fearful) or Left-Brain (dominant) behaviors. When you look at the
					chart you'll see that it is a system of opposites.</div>
				<div>When you see {{$template->horse_name}}'s profile, there will be
					a big red dot that tells you which quadrant {{($template->gender ==
					'male')?'he':'she'}} fits into. The further that dot is from the
					center, the more extreme a version of this Horsenality
					{{$template->horse_name}} is; therefore, the more challenging
					{{($template->gender == 'male')?'he':'she'}} can be to deal with.
					This distance from the center is a good indication of
					{{$template->horse_name}}'s spirit level - mild, moderate or
					extreme.</div>
				<div>
					<div class="w-75 float-start">
						<img alt="" class="w-75"
							src="{{asset('assets/reports/imgs/Background (3).png')}}">
					</div>
					<div class="w-25 float-end">
						<img alt="" class="w-75"
							src="{{asset('assets/reports/imgs/Background (4).png')}}">
						<div>The color of the shading indicates the horse's spirit level:
							Spirit level will tone down or amplify any Horsenality Type or
							specific behavior.</div>
					</div>
				</div>
				<div class="w-100 float-start my-5">
					<span class="w-50 fs-3 fw-bolder">Unique Characteristics and
						Specific Behaviors</span> <img class="w-25 mb-5" alt=""
						src="{{asset('assets/reports/imgs/Background (5).png')}}">
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
						environments can make horses behave differently and the key will
						be to flex your strategies according to these changes rather than
						treat your horse the same as you always do. This is because,
						technically, {{($template->gender == 'male')?'he':'she'}} is
						acting like a different horse. How many times have you heard
						someone say, "But my horse never acts like this at home!"
					</div>

					<table>
						<tbody>
							<tr>
								<td class="w-50"><img class="" alt=""
									src="{{asset('assets/reports/imgs/Background (7).png')}}"></td>
								<td class="w-50">When your horse acts differently from {{($template->gender
									== 'male')?'his':'her'}} usual Horsenality Type in certain
									situations, you need to respond differently...and
									appropriately. That's what great horsemen do. They
									automatically adjust. Horses are living, breathing, emotional,
									and reactive beings. It is up to us to help our horses be
									balanced and confident, no matter what the situation is.</td>
							</tr>
						</tbody>
					</table>
				</div>
			</div>
		</div>


		<div class="card my-5">
			<div class="card-header bg-secondary text-white fs-3 fw-bloder">The
				Four Horsenality Types</div>
			<div class="card-body">
				<div>Essentially, a horse is either more Extrovert (a mover) or
					Introvert (a thinker), and is innately more confident and dominant
					(Left-Brain) or less confident and more fearful (Right-Brain).</div>
				<div>
					An <span class="fw-bolder">EXTROVERTED</span> (active, energetic)
					horse is a mover and seeks activity. Extroverts have to move before
					they can think
				</div>
				<div>
					An <span class="fw-bolder">INTROVERTED</span> (inactive, low
					energy) horse is physically conservative. Introverts have to think
					before they can or want to move.
				</div>
				<div>
					An <span class="fw-bolder">LEFT-BRAIN</span> (confident, dominant)
					horse is brave. In fact, they are not looking for a leader. They
					have a tendency to challenge your leadership.
				</div>
				<div>
					An <span class="fw-bolder">RIGHT-BRAIN</span> (unconfident,
					fearful) horse is insecure and craves leadership. They are natural
					followers looking for natural leaders.
				</div>
				<img class="w-100" alt=""
					src="{{asset('assets/reports/imgs/Background (8).png')}}">
			</div>
		</div>

		<div class="card my-5">
			<div class="card-header bg-secondary text-white fs-3 fw-bloder">
				{{$template->horse_name}}'s Horsenality Type</div>
			<div class="card-body">
			
				<div class="text-center">(Horsenality Overall Rating Graph)</div>
				<img class="w-25 float-end" alt=""
					src="{{asset('assets/reports/imgs/Background (9).png')}}">
				<div>About {{$template->horse_name}}</div>
				<div>{{json_decode($template->horse_Description)}}</div>
			</div>
		</div>

		<div class="card my-5">
			<div class="card-header bg-secondary text-white fs-3 fw-bloder">
				Strategies for Success with {{$template->horse_name}}</div>
			<div class="card-body">
				<img class="w-50 float-end" alt=""
					src="{{asset('assets/reports/imgs/Background (10).png')}}">
				<h3 class="text-center">Communication, Exercise and Development</h3>
				<div>Think of your plan for creating harmony with
					{{$template->horse_name}} as having two parts:</div>
				<ol>
					<li>First, identify strategies for dealing with
						{{($template->gender == 'male')?'his':'her'}} core Horsenality
						Type...deal with the 'Big Dot' first.</li>
					<li>Next, develop a game plan for coping with behaviors that show
						up in certain situations but not necessarily all the time.
						Sometimes you even have to deal with these immediately for safety
						reasons or to help {{$template->horse_name}} get into a learning
						state of mind.</li>
				</ol>
				<div>You'll be surprised to find that the sooner you address
					{{($template->gender == 'male')?'his':'her'}} problematic behavior
					and do the appropriate thing, the fewer issues you will have.</div>
				<div>So let's get started with {{$template->horse_name}}'s "Big Dot"
					and identify the general strategies to use to help
					{{($template->gender == 'male')?'him':'hy'}} become more 'centered'
					and</div>
				<div class="w-50">
					<div>Help {{$template->horse_name}} go from this...</div>
					<div>
						<img alt="" class="w-50"
							src="{{json_decode($template->images)['from']??''}}">
					</div>
				</div>
				<div class="w-50">
					to this!
					<div>
						<img alt="" class="w-50"
							src="{{json_decode($template->images)['to']??''}}">
					</div>
				</div>
			</div>
		</div>



		<div class="card my-5">
			<div class="card-header bg-secondary text-white fs-3 fw-bloder">
				Understanding {{$template->horse_name}}'s Nature</div>
			<div class="card-body">
				<div>{{$template->H_Nature}}</div>
				<div>
					For <span class="fw-bolder">specific exercises,</span> use the
					Patterns found in the Four Savvys DVD Packs. More on this in the
					next section.
				</div>
			</div>
		</div>

		<div class="card my-5">
			<div class="card-header bg-secondary text-white fs-3 fw-bloder">Do's
				and Don'ts for {{$template->horse_name}}</div>
			<div class="card-body">
				<div>{{$template->H_Introduction}}</div>
				<div class="w-100">
					<img class="w-25" alt=""
						src="{{asset('assets/reports/imgs/Background (11).png')}}"> <span
						class="w-75 fw-bolder float-end ps-5">Do's<span><br>
							@if($template->do_dont)
							@forelse(json_decode($template->do_dont)['do'] as $k=>$v)
							{{$k+1}} - {{$v->content}}<br> @empty no data available
							@endforelse @endif </span></span>
				</div>
				<span class="fw-bolder">Do</span>
				<div>These are good things to learn and remember so that when
					{{$template->horse_name}} has trouble you can do exactly the right
					thing, right away.</div>
				<div class="w-100">
					<img class="w-25" alt=""
						src="{{asset('assets/reports/imgs/Background (12).png')}}"> <span
						class="w-75 fw-bolder float-end ps-5">Don'ts</span><br>
					@if($template->do_dont)
					@forelse(json_decode($template->do_dont)['dont'] as $k=>$v)
					{{$k+1}} - {{$v->content}}<br> @empty no data available @endforelse
					@endif
				</div>
				<span class="fw-bolder">Don't</span>
				<div>These are the things to avoid because they will cause
					{{$template->horse_name}} to become more upset and afraid of you.
					When {{($template->gender == 'male')?'he':'she'}} trusts you as
					{{($template->gender == 'male')?'his':'her'}} leader
					{{($template->gender == 'male')?'he':'she'}} will become less
					affected by what goes on around {{($template->gender ==
					'male')?'him':'hy'}}. You see, it's not about the weather, the
					spooky object, the jump, the barrels, the trail ride, the other
					horses, etc...it's about the relationship {{$template->horse_name}}
					has with you. When you become the leader {{($template->gender ==
					'male')?'he':'she'}} needs, {{($template->gender ==
					'male')?'he':'she'}} will feel calm and safe with you no matter
					what you are doing or where you are.</div>
			</div>
		</div>

		<div class="card my-5">
			<div class="card-header bg-secondary text-white fs-3 fw-bloder">
				Powerful Communication Keys</div>
			<div class="card-body">
				<div class="fw-bolder text-center">How do you tell your horse to
					calm down? How can you motivate {{($template->gender ==
					'male')?'him':'hy'}}? How do you communicate what it is you want
					{{($template->gender == 'male')?'him':'hy'}} to do? What is your
					common language?</div>
				<div>Most people will tell you to hold your horse close, to say
					'whoa' or 'quit' when {{($template->gender == 'male')?'he':'she'}}
					misbehaves, to kick to go and pull on the reins to stop. But
					nothing could be more confusing and unsettling for a horse than
					this. Horses are highly perceptive, sensitive animals and very fast
					learners unless they are confused or scared. What you need is a
					language that makes sense to horses and makes it possible for you
					to communicate better (as horses do) and be understood.</div>
				<div>The Parelli Seven Games take the mystery out of communicating
					with horses because it is based on how horses communicate with each
					other...through body language. The first game, the Friendly Game,
					builds trust and rapport. The other six games form the origin of
					every maneuver you might wish to teach your horse, from basic to
					very advanced. This means every single thing you wish to teach your
					horse or communicate to {{($template->gender ==
					'male')?'him':'hy'}} can be constructed from the Seven Games.</div>
				<div class="row w-100 my-4">
					<table>
						<tbody>
							<tr>
								<td class="w-50"><div>When you watch horses interacting and
										playing with each other you will see them use every one of the
										Seven Games.</div>
									<div>Horses are different from humans. They are prey animals
										and we are predators, but they are also herd animals so having
										a pecking order is an important part of their herd structure.
										They have an intense need to know who is dominant and
										interestingly, they jostle for dominance over each other
										constantly. This is important for you to know because you will
										have to play that game also. Every time you interact with your
										horse, you have to act like a leader and be consistent in
										setting your boundaries and communicating your expectations.
										You need to be prepared and define the relationship. If you
										don't, your horse will!</div></td>
								<td class="w-50"><img class="w-100" alt=""
									src="{{asset('assets/reports/imgs/Background (13).png')}}"></td>
							</tr>
						</tbody>
					</table>
					<div class="col-lg-6 w-50 pe-5"></div>
					<div class="col-lg-6 w-50"></div>
				</div>

				<div class="my-5">
					<h3>The Seven Games</h3>
					<div class="text-muted">Pat Parelli has titled the Seven Games with
						terms that will help you remember their action and purpose.
						Memorize them in order and then learn how to use them naturally in
						your day-to-day interactions with {{$template->horse_name}}. These
						games are the basis of your language; they are the alphabet and
						primary words from which you will build sentences and stories that
						allow you to have interesting 'conversations' with
						{{$template->horse_name}}. This is way more than training!</div>
					<ol>
						<li><span>The Friendly Game</span> builds trust and confidence. It
							is the most important game to play with horses that are tense and
							skeptical in order to convince the prey animal in them that you
							are not going to hurt or kill them.</li>
						<li><span>The Porcupine Game</span> teaches horses to yield from
							steady pressure. Use it when leading, backing up, or directing
							horses away from you. When riding, use it to get responses to
							rein and leg pressure.</li>
						<li><span>The Driving Game</span> teaches horses to yield from
							gestures and rhythmic pressure so you can move them without
							touching them. You can use this game to defend your personal
							space - very important! When you're in the saddle, you can play
							this game when with one rein, with your feet for a back up, to
							change your energy, and when riding with Carrot Sticks.</li>
						<li><span>The Yo-Yo Game</span> equalizes backward-and-forward
							tendencies in horses (most horses prefer forward movement). And,
							a big bonus, it develops straightness. It's a key part of
							transitions and promotes engagement of the hindquarters. On the
							ground it keeps horses out of your space.</li>
						<li><span>The Circling Game</span> sends the horse around you and
							teaches them to come back to you. It also teaches them the
							responsibility of continuing to circle you without being
							reminded.</li>
						<li><span>The Sideways Game</span> develops the skill of moving
							sideways. This is important for everyday things like opening
							gates, all the way up to building suspension for lead changes and
							lateral maneuvers.</li>
						<li><span>The Squeeze Game</span> teaches horses to overcome their
							fear of small or narrow spaces. This is valuable for things like
							wash racks, horse trailers, racing gates, veterinary stocks,
							gates and narrow passageways, as well as jumps, bridges, etc. The
							Squeeze Game is calming for horses and helps them overcome their
							natural claustrophobic tendencies.</li>
					</ol>

					<div>Every maneuver, no matter how simple or advanced, is made up
						of one or more of the Seven Games.</div>
					<div>If you are not familiar with the Parelli Seven Games, start
						with the Parelli Savvy Club- essential skills for safety,
						confidence, and fun, on the ground and riding. The Seven Games
						will make a HUGE difference to your success with
						{{$template->horse_name}} and with horses in general, because they
						truly are the language of horses, decoded for humans.</div>
				</div>
				<div class="my-5">
					<h3>Playing the Seven Games with {{$template->horse_name}}</h3>
					<div>Here are some predictable behaviors and reactions you may
						experience as you learn to communicate with
						{{$template->horse_name}} using the Seven Games. Some things will
						be easier for {{$template->horse_name}} and others will be harder,
						but in the end the goal is to have it all balance out. Knowing
						what to expect based on {{$template->horse_name}}'s Horsenality
						Type will give you more understanding of why it is happening and
						prepare you to be more patient and effective.</div>
					<div class="w-100 my-4">
						<img class="w-25" style="height: 800px;" alt=""
							src="{{asset('assets/reports/imgs/Background (14).png')}}">
						<div class="w-75 float-end ps-5">
							<div>THE SEVEN GAMES</div>
							<div>
								<br> @if($template->games)
								@forelse(json_decode($template->games) as $k=>$v) @if($k <= 2)
								{{$k+1}} - {{$v->game}}<br> @endif @empty no data available
								@endforelse @endif
							</div>
						</div>
					</div>
				</div>

				<div class="my-5">
					<div class="w-100 my-4">
						<img class="w-25" style="height: 800px;" alt=""
							src="{{asset('assets/reports/imgs/Background (15).png')}}">
						<div class="w-75 float-end ps-5">
							<div>THE SEVEN GAMES</div>
							<div>

								<br> @if($template->games)
								@forelse(json_decode($template->games) as $k=>$v) @if($k <= 2)
								{{$k+1}} - {{$v->game}}<br> @endif @empty no data available
								@endforelse @endif
							</div>
						</div>
					</div>
				</div>

				<div class="my-5">
					<div class="w-100 my-4">
						<img class="w-50" alt=""
							src="{{asset('assets/reports/imgs/Background (16).png')}}">
						<div class="w-50 float-start ps-5">
							<div>We really want to stress that the Seven Games are the
								language; they aren't exercises in and of themselves. Does this
								make sense? If all you do is the Seven Games, over and over, it
								will turn them into the Seven Jobs!</div>
							<div>The Seven Games help you convey to your horse what you want
								{{($template->gender == 'male')?'him':'hy'}} to do...to move
								away from your touch, or to calm down and stand still, to move
								over, go forwards, back up, come to you, make transitions,
								turn...whether you are on the ground or on {{($template->gender
								== 'male')?'his':'her'}} back. It will help you figure out what
								aspect of a maneuver is not working when you have trouble
								getting your horse to do something.</div>
							<div>Think of the Seven Games as the ingredients. The next
								section is about the exercises to do with
								{{$template->horse_name}} on a regular basis that help you
								develop and advance {{($template->gender ==
								'male')?'his':'her'}} skills: Patterns, both on the ground and
								in the saddle.</div>
						</div>
					</div>
				</div>


			</div>
		</div>


		<div class="card my-5">
			<div class="card-header bg-secondary text-white fs-3 fw-bloder">
				Constructive Exercises for Success and Advancement</div>
			<div class="card-body">
				<div>As a leader you need to have a plan for your activities with
					your horse. Your horse depends on you for this. Behavioral issues
					arise when your horse is not getting enough mental, emotional and
					physical exercise, or {{($template->gender == 'male')?'he':'she'}}
					isn't getting the kind of leadership {{($template->gender ==
					'male')?'he':'she'}} needs.</div>
				<div>We have developed a specific set of Patterns to you to
					implement with your horse. Not only do they give you a plan, they
					give you constructive exercises that cause your horse to
					participate on every level - mentally, emotionally and physically.
					They give you the opportunity to have 'conversations' and real
					communication rather than micromanaging your horse like a puppet
					and not allowing {{($template->gender == 'male')?'him':'hy'}} to
					think. You will have a simple yet brilliant training plan that
					steadily advances you both. This is how we develop our horses; it's
					our blueprint for a solid foundation.</div>
				<div>The Patterns will help you put a good foundation on your horse
					and they automatically give you the leadership skills your horse
					needs.</div>
				<div>The Parelli approach to horsemanship encourages developing the
					relationship first on the ground, ensuring you have trust and
					communication before mounting to ride. Many problems can be solved
					simply by adopting this more savvy way of preparing horses...we
					call it the Pre-Ride Check, but playing with horses on the ground
					can also be taken to an art form.</div>
				<div class="w-100 my-5">
					<img class="w-25" alt=""
						src="{{asset('assets/reports/imgs/Background (17).png')}}">
					<div class="w-75 fw-bolder float-start ps-5 text-muted">
						The unique thing about this program is that there are four main
						areas you need to become skilled with horses...I call them The
						Four Savvys. There are two on the ground, and two riding:
						<ol>
							<li>On Line - with a halter and line attached</li>
							<li>Liberty - with no line, starting in a round corral</li>
							<li>FreeStyle - riding without contact</li>
							<li>Finesse - riding with contact and precision</li>
						</ol>
						<div>By learning how to "play" with your horse in each of the Four
							Savvys you develop real savvy, a very well rounded set of skills.
							Even if you don't ride, you can play with your horse on the
							ground with On Line and Liberty. That's why we have organized our
							definitive core product series - The Four Savvys - based on this
							model. You can focus on whichever Savvy appeals to you, and
							develop your horsemanship at your own pace!</div>
					</div>

				</div>
			</div>
		</div>


		<div class="card my-5">
			<div class="card-header bg-secondary text-white fs-3 fw-bloder">The
				Right Balance between Variety and Consistency</div>
			<div class="card-body">
				<div>All horses need the right balance of consistency to help them
					gain confidence and variety to keep them stimulated and learning.
					The Seven Games help you understand how to 'talk' to
					{{$template->horse_name}} and how to direct {{($template->gender ==
					'male')?'him':'hy'}}. The Parelli Patterns give you the exercises
					to do with {{($template->gender == 'male')?'him':'hy'}} to develop
					your partnership and methodically advance your skills together.</div>
				<div class="w-100 my-5">
					<img class="w-25" alt=""
						src="{{asset('assets/reports/imgs/Background (17).png')}}">
					<div class="w-75 fw-bolder float-start ps-5 text-muted">
						<h3>Best Games and Patterns for {{$template->horse_name}}</h3>
						<div>
							<br> @if($template->patterns)
							@forelse(json_decode($template->patterns) as $k=>$v) {{$k+1}} -
							{{$v->pattern}}<br> @empty no data available @endforelse @endif
						</div>
						<div>{{$template->H_Pat_Balance}}</div>
					</div>

				</div>
			</div>
		</div>


		<div class="card my-5">
			<div class="card-header bg-secondary text-white fs-3 fw-bloder">
				Designing Your Session with {{$template->horse_name}}</div>
			<div class="card-body">
				<h3>Here's how a session with you and {{$template->horse_name}}
					might look:</h3>
				<div>{{$template->H_Session}}</div>

				<div class="w-100 my-5">
					<img class="w-25" alt=""
						src="{{asset('assets/reports/imgs/Background (17).png')}}">
					<div class="w-75 fw-bolder float-start ps-5 text-muted">
						<h3>Know when to quit:</h3>
						<div>{{$template->H_Pat_Quit}}</div>
					</div>
				</div>

				<div class="w-100 my-5">
					<img class="w-25" alt=""
						src="{{asset('assets/reports/imgs/Background (18).png')}}">
					<div class="w-75 fw-bolder float-end ps-5 text-muted">
						<div>{{$template->H_Take_Care}}</div>
					</div>
				</div>

				<div>The next session will give you some tips on handling some of
					{{$template->horse_name}}'s specific behaviors that tend to come up
					in different situations.</div>

			</div>
		</div>


		<div class="card my-5">
			<div class="card-header bg-secondary text-white fs-3 fw-bloder">
				Situation-Specific Behavior</div>
			<div class="card-body">
				<div>The chart below provides more details about
					{{$template->horse_name}}'s behavior. Regardless of
					{{$template->horse_name}}'s primary Horsenality Type and the
					quadrant {{($template->gender == 'male')?'his':'her'}} "big dot"
					falls, you may find that certain behaviors crop up on other parts
					of the chart. In fact, the more quadrants in which these dots
					appear, the more complicated {{($template->gender ==
					'male')?'he':'she'}} is. Here's the good news...if you can quickly
					adjust to handle the new behavior, you will find that they come up
					less and less. Many people have the tendency to ignore what's
					happening, or they feel frustrated and punish the horse because
					they see it as disobedience rather than something that has come up
					for good reason. You don't necessarily need to know why it
					occurred, but you do need to know what to do about it and then do
					it immediately to help {{$template->horse_name}} get more balanced
					again.</div>

				<div class="w-100 my-5">(Horsenality Detail Rating Graph)</div>


				<div class="w-100 my-5">
					<img class="w-25" alt=""
						src="{{asset('assets/reports/imgs/Background (17).png')}}">
					<div class="w-75 fw-bolder float-start ps-5 text-muted">
						<h3>Pat's Horsenality Tip</h3>

						<div>Most horses tend to load up on one primary quadrant, but
							certain situations or past baggage can cause a horse to display
							behaviors that are more typical of a different Horsenality.</div>
						<div>Think of these as the individuating characteristics of a
							horse.</div>
						<div>Even though there are four main Horsenality Types, each horse
							is an individual because of the little dots that accompany it.</div>
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
							{{$template->horse_name}}'s more extreme situational behaviors.</div>
					</div>
				</div>
			</div>
		</div>


		<div class="card my-5">
			<div class="card-header bg-secondary text-white fs-3 fw-bloder">Adjust
				to Fit the Changing Situation</div>
			<div class="card-body">
				<div class="w-100 my-5">
					<img class="w-25" alt=""
						src="{{asset('assets/reports/imgs/Background (19).png')}}">
					<div class="w-75 fw-bolder float-end ps-5 text-muted">
						<div>Over the years, many people have told me that their horse
							completely changes when moving from groundwork to riding, going
							from the arena to a trail, moving to a new place, or when the
							weather changes or when surrounded by other horses. This is what
							I call 'situational' because when the situation changes the horse
							changes.</div>
						<div>The goal is for your relationship to become so strong that
							even though the things around you and your horse might change,
							the relationship between you and your horse doesn't; so wherever
							{{$template->horse_name}} is, as long as {{($template->gender ==
							'male')?'he':'she'}}'s with you, {{($template->gender ==
							'male')?'his':'her'}} behavior will remain consistent.</div>
						<div>Now, don't expect all the problematic behaviors to be gone in
							a week or two. It will be a process where things just keep on
							improving until one day you simply don't have these issues
							anymore.</div>
						<div>I recommend that you re-chart {{$template->horse_name}} every
							six months, certainly every twelve months at a minimum. It's most
							gratifying to see the changes that {{($template->gender ==
							'male')?'he':'she'}} has made reflected on {{($template->gender
							== 'male')?'his':'her'}} Horsenality Profile, and this helps you
							adjust your own approach accordingly.</div>
						<div>A major goal of development is to move
							{{$template->horse_name}}'s extreme behaviors toward the center
							of the chart. This makes {{($template->gender ==
							'male')?'him':'hy'}} easier to play with and teach; even more
							importantly, it makes {{($template->gender ==
							'male')?'his':'her'}} life less stressful. This is because many
							of {{$template->horse_name}}'s erratic and extreme behaviors may
							be learned reactions caused by stress. Reducing or eliminating
							these will help {{($template->gender == 'male')?'him':'her'}}
							become more relaxed and centered {{($template->gender ==
							'male')?'himself':'herself'}} .</div>
						<div>The sooner you can provide what {{$template->horse_name}}
							needs, the sooner the problems will diminish and ultimately
							disappear. Just remember, the more damaged
							{{$template->horse_name}} is and the longer {{($template->gender
							== 'male')?'he':'she'}}'s had these issues, the longer it will
							take to change them. But, be patient and consistent,
							{{($template->gender == 'male')?'he':'she'}} needs your
							leadership in order to become more centered on a consistent
							basis.</div>

					</div>
				</div>
				<div class="mw-100 my-5 text-center">
					<br> <br> <br> <br> <br> <br> <br> <br> <br> <br> <br>
					<h3 class="my-5 w-100">Situational Behaviors:</h3>
					<div>
						<br> @if($template->behaviors)
						@forelse(json_decode($template->behaviors) as $k=>$v) {{$k+1}} -
						{{$v->behavior}}<br> @empty no data available @endforelse @endif
					</div>
				</div>
			</div>
		</div>


		<div class="card my-5">
			<div class="card-header bg-secondary text-white fs-3 fw-bloder">
				Strengths, Positive Characteristics and Aptitudes</div>
			<div class="card-body">
				<div class="w-100 my-5">
					<img class="w-25 float-end" alt=""
						src="{{asset('assets/reports/imgs/Background (19).png')}}">
					<div class="w-75 fw-bolder float-start ps-5 text-muted">
						<div>Just like people, horses have their strengths and weaknesses.
							We've given you a lot of information and direction to help you
							with the issues {{$template->horse_name}} has, but it's important
							to know what {{($template->gender == 'male')?'he':'she'}} is
							going to be like once {{($template->gender ==
							'male')?'he':'she'}} is emotionally balanced and centered.</div>
						<div>Knowing who the real horse is inside will help you bring that
							out in {{$template->horse_name}} and having an idea of what
							{{($template->gender == 'male')?'he':'she'}} might be most
							suitable for will also serve as a good guide. Sometimes people
							discover they have bought the wrong horse for the goal or
							activity they have in mind and this is the problem, not the
							horse. In this situation you either have to change your goal, or
							learn what it takes to have your horse like it as much as you do.
							There is always the possibility that you might decide to match
							{{$template->horse_name}} up with someone who wants to do what
							{{($template->gender == 'male')?'he':'she'}} is designed for
							while you pursue your perfect match in another horse.</div>
					</div>
				</div>
				<div class="row w-100 my-5 py-5">
					<div class="w-50 float-start">
						<div>Let's look again at {{$template->horse_name}}'s overall
							Horsenality Type. Here's {{($template->gender ==
							'male')?'his':'her'}} chart and a list of some of
							{{($template->gender == 'male')?'his':'her'}} strengths.</div>
						<div>(Horsenality Overall Rating Graph Small)</div>
					</div>
					<div class="w-50 float-end mh-50 bg-secondary">
						<ol>
							@if($template->strengths)
							@forelse(json_decode($template->strengths) as $k=>$v) @if($k <=
							2)
							<li>{{$v->strength}}</li> @endif @empty
							<li>no data available</li> @endforelse @endif
						</ol>
					</div>
				</div>
				<div class="row">{{$template->H_Aptitude_Challenges}}</div>
				<div class="row w-100 py-5">
					<img class="w-25 float-end" alt=""
						src="{{asset('assets/reports/imgs/Background (20).png')}}"> <span
						class="w-75 fw-bolder float-start ps-5 text-muted">
						{{$template->H_Pat_Strengths}} </span>
				</div>
			</div>
		</div>


		<div class="page-break"></div>
		<div class="card my-5">
			<div class="card-header bg-secondary text-white fs-3 fw-bloder">
				Resources and More</div>
			<div class="card-body">
				<div class="row w-100 my-5">
					<img class="w-25 float-start" alt=""
						src="{{asset('assets/reports/imgs/Background (21).png')}}">
					<div class="w-75 fw-bolder float-end ps-5 text-muted">
						<h3>The Horsenality/Humanality Match Report</h3>
						<div class="text-muted">Check out how your Humanality and your
							horse's Horsenality match or mismatch!</div>
						<div>Once you've identified your horse's Horsenality, your next
							step towards gaining a deeper understanding of horse behavior and
							improving your partnership with your horse is taking the
							Horsenality/Humanality Match Report. This report will assess your
							personality, link your Humanality back to your horse's
							Horsenality, and illustrate how the two of you can bring out the
							best in each other!</div>
						<div>With the Match Report, you'll learn how to overcome common
							training challenges that occur due to your Horsenality/Humanality
							differences, and you'll receive customized guidelines that tell
							you how to flex your style in order to be more successful with
							your horse. Parelli Natural Horsemanship collaborated with Dr.
							Patrick Handley, PhD - an expert in personality assessment - to
							create this expansive, comprehensive report that provides
							revealing insights on your personality strengths and weaknesses,
							and how they will affect your partnership with your horse.</div>
						<div>When Pat is asked which Humanality matches best with a
							certain Horsenality, his answer is always simply "a horseman."
							There is no perfect recipe for a horse/human partnership, but
							with resources like the Horsenality/Humanality Match Report, you
							will take a huge step towards developing true harmony with your
							horse, no matter your differences.</div>
					</div>
				</div>
				<div class="w-100 my-5">
					<img class="w-25 float-end" alt=""
						src="{{asset('assets/reports/imgs/Background (22).png')}}">
					<div class="w-75 fw-bolder px-5 text-muted">
						<h3>The Horsenality/Humanality Match Report</h3>
						<div class="text-muted">Check out how your Humanality and your
							horse's Horsenality match or mismatch!</div>
						<div>Once you've identified your horse's Horsenality, your next
							step towards gaining a deeper understanding of horse behavior and
							improving your partnership with your horse is taking the
							Horsenality/Humanality Match Report. This report will assess your
							personality, link your Humanality back to your horse's
							Horsenality, and illustrate how the two of you can bring out the
							best in each other!</div>
						<div>With the Match Report, you'll learn how to overcome common
							training challenges that occur due to your Horsenality/Humanality
							differences, and you'll receive customized guidelines that tell
							you how to flex your style in order to be more successful with
							your horse. Parelli Natural Horsemanship collaborated with Dr.
							Patrick Handley, PhD - an expert in personality assessment - to
							create this expansive, comprehensive report that provides
							revealing insights on your personality strengths and weaknesses,
							and how they will affect your partnership with your horse.</div>
						<div>When Pat is asked which Humanality matches best with a
							certain Horsenality, his answer is always simply "a horseman."
							There is no perfect recipe for a horse/human partnership, but
							with resources like the Horsenality/Humanality Match Report, you
							will take a huge step towards developing true harmony with your
							horse, no matter your differences.</div>
					</div>
				</div>
				<div class="row w-100 my-5">
					<h3>The Parelli Four Savvys Program</h3>
					<div>Pat has identified four "ways" of playing with horses, four
						areas in which a horse and human can learn from one another. He
						dubbed these areas "the Four Savvys." Together they form the
						blueprint for you as a horseman, and for the Parelli Program as a
						whole.</div>
					<h4>There are two Savvys on the ground:</h4>
					<div>
						<h4 class="px-5">On Line</h4>
						<div class="px-5">This foundational Savvy takes place on the
							ground, using a halter and ropes of varying lengths as a safety
							net while you are learning to communicate in your horse's
							language. Here, you will learn how to play the Seven Games.</div>
					</div>
					<div>
						<h4 class="px-5">Liberty</h4>
						<div class="px-5">What if you could communicate with your horse
							without any ropes at all? In Liberty, you'll learn how to
							interact with horses when they are free, whether in a stall,
							pasture, in the wild... or in a round corral. From catching to
							developing high-level maneuvers like flying changes, this Savvy
							is all about building a bond stronger than any lead rope, and
							mastering your own emerging horse behavior skills.</div>
					</div>
					<h4>And there are two Savvys in the saddle:</h4>
					<div>
						<h4 class="px-5">FreeStyle</h4>
						<div class="px-5">Riding on loose reins is how you teach horses to
							relax and teach riders to have a truly independent seat.
							FreeStyle riding builds confidence and "responsibility" in the
							horse, where he learns to really act as a partner instead of a
							robot. The rider learns how to balance without hanging on the
							reins or gripping with their legs. At its highest level, you will
							be able to ride bareback and bridleless with confidence and ease.</div>
					</div>
					<div>
						<h4 class="px-5">Finesse</h4>
						<div class="px-5">Finesse is about ultimate refinement. It
							encompasses riding close to your horse, with concentrated reins,
							with a soft, polite and willing feel, and with vertical flexion.
							You learn how to improve your posture, to be more fluid, and have
							your horse become rounder, more collected and elegant.</div>
					</div>

				</div>
				<div class="row w-100 my-5">
					<div>When I go to play with my horse, sometimes I only play on the
						ground - mostly at Liberty these days, unless I take him jumping
						logs and moving out in the playground, but mostly I ride. So I'm
						playing in two or three Savvys sometimes. It makes it more
						interesting, and I tend to get more creative and thoughtful about
						what I'm doing and where I'm going with my horse as we advance.
						And now that I'm studying the art of riding with precision with
						dressage master Walter Zettl, I find it more important than ever
						to keep a balance in the Four Savvys, rather than becoming overly
						focused on Finesse.</div>
					<div>Many times, people will want to start at the top with the most
						challenging things, but that doesn't always lead to putting the
						horse first. I think Pat has organized the Savvys in such a way
						that it encourages people to get the fundamentals down first. Once
						you've got a solid foundation, you start making incredible
						progress, and that's when the real fun begins! If you want to
						become a horseman, that's the way to do it!</div>
					<h3>Parelli Professionals</h3>
					<div>Parelli Instructors (officially known as Parelli
						Professionals) are talented, dedicated Parelli students who have
						been certified to teach the Parelli Program out in the field.
						Instructors can give one-on-one horsemanship lessons, lead group
						lessons and clinics, and more. As an Instructor gains experience
						and skill, their "star rating" increases, which allows them to
						teach more Savvys at higher levels.</div>
					<div>There are Parelli Professionals available throughout the world
						offering natural horsemanship training in a number of different
						formats. Educational formats include coaching, private lessons,
						group lessons, half-day or full-day clinics, workshops focusing on
						a particular skill, and multi-day camps.</div>
					<h3>Savvy Club Membership</h3>
					<div>The Parelli Savvy Club is a worldwide membership community
						that gives you access to the Levels Program (Levels 1-4),
						thousands of educational videos and articles, and presents
						opportunities to interact with other like-minded horse
						enthusiasts, develop your confidence and overcome fears, solve
						horse behavior problems and discipline issues, connect with Pat
						Parelli, ask questions, and get support to becoming a better
						horseman.</div>
					<h3>Parelli Courses Around the World</h3>
					<div>When you're ready to immerse yourself in the ultimate
						educational horsemanship experience, we encourage you to take a
						course at one of our Parelli campuses around the world. Courses
						are led by talented Parelli Professionals and give students the
						opportunity to delve into a specific topic or Savvy for a week or
						more. Visit www.parelli.com to learn more about courses and how to
						apply!</div>
					<div>{{$template->H_Cusp_Supplement}}</div>
				</div>
			</div>
		</div>

	</div>
</body>
</html>