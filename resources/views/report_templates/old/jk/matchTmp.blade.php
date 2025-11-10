<!DOCTYPE html>
<html>

<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Humanality / Match Report</title>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
<!-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous"> -->

<style>
.page-break {
	page-break-after: always;
}
</style>
</head>

<body class="fs-4">
	<div class="container-fluid my-5">
		<img alt="" class="w-100"
			src="{{asset('assets/reports/temps/humanality/Background (25).png')}}">
		<h1 class=text-center>For MERGEFIELD</h1>
		<h1 class="text-center">([{{$template->FIRSTNAME_P}}])</h1>
		<h6 class="card-subtitle mb-2 text-muted">Based on data provided by
			MERGEFIELD [FIRSTNAME_P] ([{{$template->FIRSTNAME_P}}]) MERGEFIELD
			[LASTNAME_P] ([{{$template->LASTNAME_P}}]) MERGEFIELD
			[Assessment-date] ([{{$template->assessment_date}}])</h6>
		<div class="card my-5">
			<div class="card-header bg-secondary text-white fs-3 fw-bloder">Your
				Your Humanality Report</div>
			<div class="card-body">
				<div class="row">
					<div class="w-50">
						<div class="my-3">Welcome to your Humanality Report, Section 2 of
							the Parelli Horsenality/Humanality/Match System.</div>
						<div class="my-3">We've coined a new word, "Humanality" because we
							want you to expand your thinking about what influences your
							behavior. Consider the situation you are in, your previous
							experiences, and innate tendencies. These combined factors are so
							much more than what people usually think about when they use the
							word "personality." The phrase "Humanality" seems to capture the
							whole person best, and just as we consider the whole horse
							(innate characteristics, learned behavior, environment, and
							spirit) when we discuss the behavior patterns of horses, we want
							to do the same with humans.</div>
					</div>
					<div class="w-50 float-end">
						<img class="w-75 mw-75 min-w-25"
							src="{{asset('assets/reports/temps/humanality/Background (27).png')}}" />
					</div>
				</div>
				<div class="row my-5">
					<div class="my-3">In this section of the report, we're going to
						focus on people and their wonderful Humanality differences! We're
						bringing in an expert in this area, who is also an avid student of
						the Parelli program. Dr. Patrick Handley, a psychologist and
						personality assessment expert, will share insights about your
						Humanality strengths and challenges. He has worked with us for
						several years to develop and validate this assessment so that it
						fits our Horsenality system perfectly.</div>
					<div class="my-3">You are in for some interesting and revealing
						learning experiences. Dr. Handley will provide his professional
						coaching and feedback throughout your report. We like his approach
						because he focuses on strengths and how you can become your
						personal best. That fits so perfectly with how we see the
						development of people and horses.</div>
					<div class="my-3">We will be back with you at the end for the
						transition into Section 3, where your Humanality results get
						paired with {{$template->horse_name}}'s Horsenality. Prepare to gain more
						savvy about yourself.</div>
					<div class="my-3">Yours Naturally,</div>
					<div class="my-3">
						<img alt=""
							src="{{asset('assets/reports/temps/humanality/Background (28).png')}}">
					</div>
					<div>Pat Parelli</div>
				</div>
			</div>
		</div>
		<div class="card my-5">
			<div class="card-header bg-secondary text-white fs-3 fw-bloder">Meet
				Patrick Handley, Ph.D.</div>
			<div class="card-body">
				<div class="my-3">Dr. Patrick Handley is a licensed psychologist and
					personality assessment expert. His best-known product, the INSIGHT
					Inventory, a strengths-based personality assessment, and has been
					used by over a million people and translated into seven languages.</div>
				<div class="my-3">Dr. Handley specializes in researching and
					developing customized personality tests, behavioral feedback
					questionnaires, and leadership assessments. His specialty area of
					study when getting his Ph.D. in Counseling Psychology was
					personality assessment and organizational development. Prior to
					creating his own company, he was on the faculty at Virginia
					Polytechnic University and the University of Missouri at Kansas
					City. In those roles he worked directly with students in the
					counseling and career centers and taught graduate level courses in
					personality assessment and personality theory. Since then, in his
					over 30 years of organizational consulting, Dr. Handley has helped
					numerous companies use personality assessments to identify
					leadership potential, build teams, and develop employee talent and
					potential. He now brings all his previous academic and work
					experience together to help co-create the online Parelli Humanality
					System.</div>
				<div class="my-3">A lifelong horse owner and avid student of the
					Parelli program, Dr. Handley has worked directly with Parelli
					Natural Horsemanship to take the Parelli Humanality questionnaires
					to the highest level of professionalism and academic standards.
					This has involved recalibrating the original scales and the
					development of the online Humanality questionnaire.</div>
				<div class="my-3">Dr. Handley views the development of any
					world-class assessment as an ongoing process. To ensure that both
					the Humanality assessments achieve this status, he is managing the
					factor analysis of items, reliability and validity research and
					continued improvement of the supporting reports.</div>
				<div class="row my-5">
					<div class="w-25">
						<img alt="" class="w-75"
							src="{{asset('assets/reports/temps/humanality/Background (26).png')}}">
					</div>
					<div class="w-75">
						<div class="text-danger mb-3">I'm especially excited about the
							Parelli Humanality report. My goal is to help you better
							understand your Humanality around people. I'll look at your
							scores from the perspective of a psychologist and help you
							interpret your results. You'll learn how they reveal your
							strengths, core motivations, and reactions to stress. Then, I'll
							get more specific and identify some "Do's" and "Don'ts" for
							improving your communications with others.</div>
						<div class="text-danger my-3">As you increase your understanding
							of your Humanality, you'll become better prepared to look at your
							specific relationship with your horse. This report will help you
							gain valuable insights in understanding yourself and others.</div>
					</div>
				</div>
			</div>
		</div>

		<div class="card my-5">
			<div class="card-header bg-secondary text-white fs-3 fw-bloder">Report
				Contents</div>
			<div class="card-body">

				<p class="text-muted">PART 1</p>
				<p>The Parelli Humanality Profile</p>

				<p class="text-muted">PART 2</p>
				<p>The Four Humanality Types</p>

				<p class="text-muted">PART 3</p>
				<p>All about Humanality</p>

				<p class="text-muted">PART 4</p>
				<p>Your Humanality Questionnaire Results</p>

				<p class="text-muted">PART 5</p>
				<p>Understanding Your Core Nature</p>

				<p class="text-muted">PART 6</p>
				<p>Communication Do's</p>

				<p class="text-muted">PART 7</p>
				<p>Communication Don'ts</p>

				<p class="text-muted">PART 8</p>
				<p>Your Behavior In Different Situations</p>

				<p class="text-muted">PART 9</p>
				<p>Building On Your Strengths</p>

				<p class="text-muted">PART 10</p>
				<p>Learning More About Yourself From Others</p>

				<p class="text-muted">PART 11</p>
				<p>Summing Up</p>
			</div>
		</div>
		<div class="card my-5">
			<div class="card-header bg-secondary text-white fs-3 fw-bloder">The The
				Parelli Humanality Profile</div>
			<div class="card-body">
				<div class="my-3">The Parelli Humanality Profile identifies your
					strengths and pinpoints your primary traits in two core traits:
					Extrovert/Introvert and Left-Brain/Right-Brain.</div>
				<div class="fw-bolder">The vertical (up and down) axis on the chart
					measures:</div>
				<div class="my-3">EXTROVERT (how outgoing, animated, and expressive
					you are)</div>
				<div class="my-3">INTROVERT (how reserved, quiet, and
					non-demonstrative you are)</div>

				<div class="fw-bolder">The horizontal (left and right) axis on the
					chart measures:</div>
				<div class="my-3">LEFT-BRAIN (how confident, candid, and dominant
					you are)</div>
				<div class="my-3">RIGHT-BRAIN (how indirect, emotional, and cautious
					you are)</div>


				<div class="my-3">These axes create four Humanality quadrants. There
					are many variations of intensity and each of these fine tunes the
					descriptions of your personality. The first step however is to
					develop an understanding of the four quadrants.</div>
				<div class="fw-bolder">Your Primary Quadrant</div>
				<div class="my-3">When you review your profile, you'll see a big
					blue dot that indicates which quadrant of behaviors you primarily
					exhibit. The further from the center the dot is, the more intensely
					you'll display the characteristics. This distance is a good
					indication of your spirit level.</div>

				<div class="row my-5">
					<div class="w-50">
						<img class="w-100" alt=""
							src="{{asset('assets/reports/temps/humanality/Background (29).png')}}">
					</div>
					<div class="w-50">
						<img class="w-50" alt=""
							src="{{asset('assets/reports/temps/humanality/Background (30).png')}}">
						<div>The color of the shading indicates your spirit level.</div>
						<div>According to how low, moderate, or high it is, spirit level
							will tone down or amplify any Humanality Type or specific
							behavior.</div>
					</div>
				</div>
			</div>
		</div>

		<div class="card my-5">
			<div class="card-header bg-secondary text-white fs-3 fw-bloder">The
				Four Humanality Types</div>
			<div class="card-body">
				<div class="row">
					<div class="w-75">
						<h3 class="my-3">Know yourself and understand others</h3>
						<div class="my-3">Let's look more closely at the four Humanality
							types that the Parelli Profile generates. Playful caricatures and
							short descriptions reveal the general characteristics of the four
							types. Have fun studying these and don't take them to personal at
							this point. One of the first things we have to do is laugh a bit
							at our core tendencies and behavior patterns.</div>
					</div>
					<div class="w-25">
						<img class="w-75" alt=""
							src="{{asset('assets/reports/temps/humanality/Background (26).png')}}">
					</div>
				</div>
				<div class="row">
					<table class="table table-bordered">
						<tbody>
							<tr>
								<td class="w-25"><img class="w-100" alt=""
									src="{{asset('assets/reports/temps/humanality/Background (31).png')}}">
								</td>
								<td class="w-75">
									<h3>Right-Brain Extrovert</h3>
									<div>Right-Brain Extroverts are outgoing, emotional, sensitive,
										and responsive to others. They like people and seek the
										approval of others. They're social and approachable, think
										quickly and talk about their feelings openly. Although
										excitable and sometimes volatile, Right-Brain Extroverts are
										relationship builders and try to keep these as conflict free
										as possible. They tend to be enthusiastic, energetic, and
										people focused.</div>
								</td>
							</tr>
							<tr>
								<td class="w-25"><img class="w-100" alt=""
									src="{{asset('assets/reports/temps/humanality/Background (32).png')}}">
								</td>
								<td class="w-75">
									<h3>Right-Brain Introvert</h3>
									<div>Right-Brain Introverts are diplomatic, tactful, cautious
										in new situations and somewhat private. They tend to hold
										their feelings and thoughts in and want to avoid conflict or
										confrontation. They're modest and non-assertive, but sometimes
										emotionally tense and volatile when pushed. This can make them
										hard to read or to appear unpredictable. Right-Brain
										Introverts tend to be very caring, attentive to others, and
										sometimes overly sensitive.</div>
								</td>
							</tr>
							<tr>
								<td class="w-25"><img class="w-100" alt=""
									src="{{asset('assets/reports/temps/humanality/Background (33).png')}}">
								</td>
								<td class="w-75">
									<h3>Left-Brain Introvert</h3>
									<div>Left-Brain Introverts are strong-willed and task driven,
										but rather quiet and self contained. They tend to present
										their thoughts in factual rather than emotional ways. They are
										a bit guarded and tend not to express their feelings even when
										there is a lot going on with them personally. Left-Brain
										Introverts are data- and systems-focused, skeptical of
										unproven ideas, and analytical.</div>
								</td>
							</tr>
							<tr>
								<td class="w-25"><img class="w-100" alt=""
									src="{{asset('assets/reports/temps/humanality/Background (34).png')}}">
								</td>
								<td class="w-75">
									<h3>Left-Brain Extrovert</h3>
									<div>Left-Brain Extroverts are strong-willed, expressive, and
										demonstrative. They say what they are thinking and feeling and
										do so in an outgoing manner. They're assertive and candid, and
										when they want to get things done, they'll approach you
										directly and use their persuasive style to convince you of
										their ideas. Left-Brain Extroverts are results-oriented and
										driven.</div>
								</td>
							</tr>
						</tbody>
					</table>
				</div>
			</div>
		</div>

		<div class="card my-5">
			<div class="card-header bg-secondary text-white fs-3 fw-bloder">All
				About Humanality</div>
			<div class="card-body">
				<div class="row">
					<div class="w-75">
						<div class="my-3">Before discussing your Humanality questionnaire
							results, let's explore what makes you the way you are. Your
							Humanality reflects your innate characteristics, learned
							behaviors, adaptation to situations, and spirit/energy
							level.Sound familiar? Pat identifies these same things as the
							major shapers of a horse's Horsenality.</div>
						<div class="my-3">Let's explore how these four factors impact your
							Humanality. Keep in mind that as a human, you are different from
							your equine friends. You have self-awareness, can reason at a
							high level, and rather than living in the moment as horses do,
							you can think about the past and future. You also have the
							capacity to observe yourself and figure out why you are the way
							you are. This enables you to understand and intentionally change
							your behavior as you learn and grow.</div>
					</div>
					<div class="w-25">
						<img class="w-75" alt=""
							src="{{asset('assets/reports/temps/humanality/Background (26).png')}}">
					</div>
				</div>
				<div class="row">
					<div class="w-25">
						<img class="w-75" alt=""
							src="{{asset('assets/reports/temps/humanality/Background (35).png')}}"><br>
						Part of Humanality comes from your DNA

					</div>
					<div class="w-75">
						<div class="my-3">Innate characteristics are the traits you were
							born with and inherited in your DNA. Usually these surfaced early
							and were clearly observable by others who knew you when you were
							a small child.</div>
						<div class="my-3">Research by psychologists and
							sociologists-primarily in studies of twins-suggest that at least
							50 percent of your Humanality is genetic. Therefore, your DNA can
							explain approximately half of your Humanality tendencies. These
							traits are relatively stable and with you your entire life. The
							rest are learned behaviors.</div>
					</div>
				</div>
				<div class="my-5">Innate characteristics often determine your
					immediate and instinctive reactions to other people and situations.
					These can really be powerful strengths that help you in many life
					situations.</div>
				<div>However, what you learn sometimes modifies your innate
					reactions. You may learn certain responses that actually conceal or
					cover up your innate tendencies. This is sometimes for the better
					when your innate responses are not productive. It's good that you
					can learn to override these with learned behaviors. For example,
					maybe you are naturally impatient, but you've learned through your
					work with horses to be a more patient person.</div>
				<div>Unfortunately, you may also have learned some behaviors that
					keep you from using some of your innate strengths. For example,
					perhaps you were a joyful expressive child but learned, from strict
					teachers or shy parents, to shut down that side of you.</div>
				<div>To avoid losing some of your strengths you need to rediscover
					them and find ways to use them. Reflect on what behaviors you'd
					like to recapture and take a fresh look at how they may have served
					you positively in the past and consider how they can do the same
					now. Pay close attention to the list of your strengths later in
					this report. This list is designed to help you be the best "you"
					that you can be. Sometimes this means reclaiming your "real" you,
					valuing the innate characteristics you were born with, and learning
					anew to feel good about them.</div>
				<div class="row my-5">
					<div class="w-75">
						<h3>Learned Behavior</h3>
						<div>Learned behaviors are patterns you have adopted by observing
							and interacting with others, consciously or unconsciously.</div>
						<div>As a small child, you initially learn from family members and
							caretakers. Later the influences include playmates, relatives,
							schoolteachers, and other people you were around during your
							childhood and teenage years.</div>
					</div>
					<div class="w-25">
						<img class="w-75" alt=""
							src="{{asset('assets/reports/temps/match/Background (43).png')}}">
					</div>
				</div>
				<div class="my-3">
					You observed and modeled behaviors the quickest when young because
					children (like horses) are great mimics. You watched your parents,
					older siblings and relatives and may have unconsciously replicated
					many of their behavioral patterns. For instance, did you ever tell
					yourself that you were not going to be like your parents? Then, as
					you got older, you caught yourself saying or doing something just
					as your parents might have. That's an example of an
					<code>unconsciously</code>
					learned behavior.
				</div>
				<div class="my-3">On the positive side, you can intentionally
					identify mentors and talented individuals whom you admire and
					pattern yourself after them. When doing so, you can learn and mimic
					behaviors that help you accomplish important personal goals.</div>
				<div class="my-3">When these learned behaviors serve you well, they
					are desirable and worth developing. But when they don't, they are
					undesirable and can be difficult to quit. It's like breaking a bad
					habit.</div>
				<div class="my-3">You have also learned how to behave around horses,
					usually through someone else. By observing others and interacting
					with horses you may have learned certain ways to treat horses or
					have formed opinions that don't necessarily equate with facts about
					equine psychology/behavior. You may have also learned to be
					confident and brave or fearful and hesitant, patient and loving or
					strict and aggressive. Forming a happy relationship with a horse
					usually requires you to increase your "savvy" and even unlearn some
					behaviors that you never questioned before so you can replace those
					with more natural and effective approaches.</div>
				<h3 class="my-5">Environmental Shapers and Influences</h3>
				<div class="row my-5">
					<div class="w-25">
						<img class="w-75" alt=""
							src="{{asset('assets/reports/temps/humanality/Background (36).png')}}">
					</div>
					<div class="w-75">
						<div class="my-3">The situation or environment you are in can have
							an impact on how you behave. One situation may include people who
							bring out certain behaviors in you while another situation may
							inhibit or suppress those same traits.</div>
						<div class="my-3">To truly understand and appreciate your
							behavior, you must consider the various influences within each
							situation. These can cause you to behave in ways that seem
							inconsistent with who you know you are and how you normally
							behave. Always think about the environment you are in when you
							look at your behavior.</div>
					</div>
				</div>
				<div>Different situations also impact a horse's behavior. A horse
					can be calm and focused in the arena, but fractious, spooky, and
					distracted on the trail. Or, a horse that is usually willing and
					responsive could be frightened or resistant when asked to load into
					a trailer. .</div>
				<div>Situational changes are easier to notice in horses and other
					people because you can see the changes. When changes occur in you,
					they can be harder to acknowledge because there is usually some
					level of emotion or stress that clouds your self-observation.</div>
				<div>For example, you may believe you are confident both in the
					arena and on the trail. However, when you get out on a trail you
					may start remembering a previous problem or accident you had. The
					trail environment triggers this but riding in an arena doesn't. As
					a result, when on the trail you may unconsciously send out some
					nervous or anxious energy. Since horses are so incredibly sensitive
					to even the smallest changes in emotions and body language, your
					horse will read your nervousness loud and clear. As a result, your
					horse may start reacting to you and become agitated and skeptical.
					This makes you more nervous, and a problematic cycle starts.</div>
				<div>If you're not careful, you might blame your horse when the
					problem actually started with you.</div>
				<div>Increasing your awareness of how different situations or
					settings bring out different sides of you is one of the most
					important skills to learn from this program. That's why you
					completed the Parelli Humanality Profile in two settings: around
					people and around horses. A key goal is to help you discover and
					better understand your innate tendencies but also understand how
					different settings affect your behavior and what may trigger these
					shifts. Later, in the Match Report, we will address similar issues
					with you when around your horse.</div>

				<div class="row my-5">
					<div class="w-75">
						<div>Your spirit and energy level amplifies your Humanality
							traits. People who have high spirit will find their scores
							falling on the outer rings of the chart. People with lower spirit
							plot closer to the center. Spirit refers to intensity, not
							motivation, and does not measure your ability to accomplish
							goals. All scores, regardless of the spirit/energy level, have
							certain strengths. Think of spirit as intensifying your
							Humanality traits.</div>
					</div>
					<div class="w-25">
						<img class="w-75" alt=""
							src="{{asset('assets/reports/temps/humanality/Background (37).png')}}">
					</div>
				</div>
				<div class="my-3">For example, consider two extroverted individuals,
					one with a low spirit/energy level and the other with a high
					spirit/energy level. They each have the same core extroverted trait
					and will be friendly and warm. Although they are both fairly
					outgoing and talkative, the one with the higher spirit comes across
					as a bear-hugging, joke-telling dynamo. The high spirit and energy
					intensifies and magnifies the extroverted trait.</div>
				<div class="my-3">Now, consider two introverted people, one with a
					low spirit/energy level and the other with a high spirit/energy
					level. They both are reserved and rather quiet. However the one
					with the higher intensity uses that pronounced introversion to
					concentrate on highly technical information. This person can work
					alone for extended periods of time and even prefers this. The other
					person, the one with low spirit level, is not as introverted. As a
					result, this person only likes to work alone for short periods of
					time and then, gets bored and needs some interaction from others to
					remain engaged and interested. This person's introverted trait is
					less intense, closer to the center of the profile.</div>
				<div class="my-3">As you look at your Parelli Humanality Profile
					results, note how far out from the center your score (the big blue
					dot) falls. The further out it is, the higher your spirit/energy
					level or "intensity" on that trait.</div>
				<div class="my-3">Now, let's learn more about the four Humanality
					types measured by the Parelli Humanality Profile.</div>

			</div>
		</div>

		<div class="card my-5">
			<div class="card-header bg-secondary text-white fs-3 fw-bloder">Quick
				Reference of Core Natures</div>
			<div class="card-body">
				<h3 class="text-center">QUICK REFERENCE</h3>
				<h3 class="text-center">The Parelli Humanality Profile</h3>

				<img class="w-100" alt=""
					src="{{asset('assets/reports/temps/humanality/Background (38).png')}}">
			</div>
		</div>


		<div class="card my-5">
			<div class="card-header bg-secondary text-white fs-3 fw-bloder">Your
				Humanality Questionnaire Results</div>
			<div class="card-body">
				<h3 class="text-center">Your Humanality Profile</h3>
				<h3 class="text-center">{{$template->P_Personality_graph}}</h3>
				<h3>Overview of Your Humanality</h3>
				<div>{{$template->P_Description}}</div>
			</div>
		</div>


		<div class="card my-5">
			<div class="card-header bg-secondary text-white fs-3 fw-bloder">Understanding
				Your Core Nature</div>
			<div class="card-body">
				<div>Before identifying your specific strengths and behavioral
					patterns, it's important to develop an understanding of the general
					characteristics of your primary quadrant. Many of the
					characteristics will describe you, but because you're unique you
					may spot some tendencies that you believe just don't quite fit.
					Think these over, but before you decide these aren't descriptive of
					you, ask your friends and family for their feedback. You might be
					surprised by what they say!</div>
				<div>{{$template->P_Core_Nature}}</div>
			</div>
		</div>


		<div class="card my-5">
			<div class="card-header bg-secondary text-white fs-3 fw-bloder">Communication
				Do's</div>
			<div class="card-body">
				<div>{{$template->P_Dos_Intro}}</div>

				<div class="row my-5">
					<div class="w-25">
						<img class="w-75" alt=""
							src="{{asset('assets/reports/temps/humanality/Background (26).png')}}">
						<div>Do's for increasing your communication skills</div>

					</div>
					<div class="w-75">
						<h3>Do's</h3>
						<div>
        					@if($template->P_Dos_List)
        					@forelse(json_decode($template->P_Dos_List)->do as $k=>$v)
        					{{$k+1}} - {{$v}}<br>
        					@empty
        					no data available
        					@endforelse
        					@endif
        				</div>
					</div>
				</div>
				<div class="my-5">Write some other things you've learned to "DO" to
					help you communicate with others, particularly individuals who have
					the opposite Humanality traits.</div>
				<h3>Example:</h3>
				<div>I need to remember to notice and appreciate small efforts by
					others, particularly people who don't tend to speak up or draw
					attention to themselves and not be so fast-paced and urgent that I
					overlook what they've done.</div>
				<div>_____________________________________________________________________________________________________________</div>
				<div>_____________________________________________________________________________________________________________</div>
				<div>_____________________________________________________________________________________________________________</div>
				<div>_____________________________________________________________________________________________________________</div>
				<div>_____________________________________________________________________________________________________________</div>
				<div>_____________________________________________________________________________________________________________</div>
				<div>_____________________________________________________________________________________________________________</div>
				<div>_____________________________________________________________________________________________________________</div>
				<div>_____________________________________________________________________________________________________________</div>

			</div>
		</div>

		<div class="card my-5">
			<div class="card-header bg-secondary text-white fs-3 fw-bloder">Communication
				Don'ts</div>
			<div class="card-body">
				<h3>Avoid overusing your strengths, don't become part of the
					problem.</h3>
				<div>{{$template->P_Donts_Intro}}</div>

				<div class="row my-5">
					<div class="w-25">
						<img class="w-75" alt=""
							src="{{asset('assets/reports/temps/humanality/Background (26).png')}}">
						The goal is to learn to catch yourself when your innate reaction
						causes problems. Then "flex" to a more effective response.


					</div>
					<div class="w-75">
						<h3>Don't</h3>
						<div>
        					@if($template->P_Donts_List)
        					@forelse(json_decode($template->P_Donts_List)->dont as $k=>$v)
        					{{$k+1}} - {{$v}}<br>
        					@empty
        					no data available
        					@endforelse
        					@endif
        				</div>
					</div>
				</div>
				<div class="my-5">Write down some other things you've learned that
					are important "DON'TS" that you'd like to practice more often,
					particularly when under stress.</div>
				<h3>Example:</h3>
				<div>Sometimes I snap back with a witty but cutting remark. I think
					fast on my feet, particularly when I feel challenged or put down.
					I'm going to try to avoid reacting too quickly and making matters
					worse.</div>
				<div>_____________________________________________________________________________________________________________</div>
				<div>_____________________________________________________________________________________________________________</div>
				<div>_____________________________________________________________________________________________________________</div>
				<div>_____________________________________________________________________________________________________________</div>
				<div>_____________________________________________________________________________________________________________</div>
				<div>_____________________________________________________________________________________________________________</div>
				<div>_____________________________________________________________________________________________________________</div>
				<div>_____________________________________________________________________________________________________________</div>
				<div>_____________________________________________________________________________________________________________</div>

			</div>
		</div>

		<div class="card my-5">
			<div class="card-header bg-secondary text-white fs-3 fw-bloder">Your
				Behavior in Different Situations</div>
			<div class="card-body">
				<div>You may find that your behavior changes somewhat from one
					situation to another. This is called "flexing." Your core
					Humanality remains in place, but you behave differently because
					you're adapting to the people you're around or the setting you're
					in. For example, you may alter your behavior at work to accomplish
					specific work goals or fulfill day-to-day responsibilities. At home
					you may display other behaviors when communicating with family
					members. The goal is to behave in ways that improve communications,
					but sometimes certain situations bring out stress reactions.</div>
				<div>To understand how and why your behavior changes, chart your
					style in different situations and notice when your "big blue dot"
					moves, particularly if you switch from one quadrant to another.</div>
				<h3>Identify your primary style at Work (or School) as well as your
					Personal Style and plot these by drawing a dot on the profile
					charts below and list some reasons for any changes.</h3>

				<div class="row my-5">
					<div class="w-50 text-center">
						<h3>Work Style (or School Style)</h3>
						<div>My primary style at work (or school) is:</div>
						<div class="my-5">_______________________________________</div>
						<div>Reasons:</div>
						<div class="my-3">_______________________________________</div>
						<div class="my-3">_______________________________________</div>
						<div class="my-3">_______________________________________</div>

					</div>
					<div class="w-50">
						<img class="w-75" alt=""
							src="{{asset('assets/reports/temps/humanality/Background (39).png')}}">
					</div>
				</div>

				<div class="row my-5">
					<div class="w-50 text-center">
						<h3 class="">Personal Style</h3>
						<div>My style at home around family and friends is:</div>
						<div class="my-5">_______________________________________</div>
						<div>Reasons:</div>
						<div class="my-3">_______________________________________</div>
						<div class="my-3">_______________________________________</div>
						<div class="my-3">_______________________________________</div>

					</div>
					<div class="w-50">
						<img class="w-75" alt=""
							src="{{asset('assets/reports/temps/humanality/Background (39).png')}}">
					</div>
				</div>
			</div>
		</div>

		<div class="card my-5">
			<div class="card-header bg-secondary text-white fs-3 fw-bloder">Building
				on Your Strengths</div>
			<div class="card-body">
				<div>Each Humanality type has its strengths and positive
					characteristics. It's important to embrace your strengths and learn
					to use them effectively. This sounds easy, but sometimes it's not.
				</div>
				<div>You may have received messages in the past from others who
					didn't understand why you behaved the way that you did or who
					didn't appreciate your strengths. This probably says more about
					them than it does you, but all the same, these messages may have
					caused you to change your behavior and cover up some of who you
					really are. Even, years later, you may still not be using some of
					your most natural strengths.</div>
				<h3>This section will help you relook at the typical strengths of
					your Humanality type and provide suggestions on ways to bring them
					out in positive, constructive ways. Review the following strengths.
					Check the ones you'd like to keep doing and build upon.</h3>
				<div>{{$template->P_Strengths_Profile}}</div>

				<div class="row my-5">
					<div class="w-25">
						<img class="w-75" alt=""
							src="{{asset('assets/reports/temps/humanality/Background (26).png')}}">
					</div>
					<div class="w-75 text-center">{{$template->P_Strengths_Text}}</div>
				</div>
				<div class="my-5">
					<h3>STRENGTHS WORKSHEET</h3>
					<div>List some other Humanality strengths you've developed that
						you'd like to continue practicing.</div>
					<div>_____________________________________________________________________________________________________________</div>
					<div>_____________________________________________________________________________________________________________</div>
					<div>_____________________________________________________________________________________________________________</div>
					<div>_____________________________________________________________________________________________________________</div>
					<div>_____________________________________________________________________________________________________________</div>
					<div>_____________________________________________________________________________________________________________</div>
					<div>_____________________________________________________________________________________________________________</div>
					<div>_____________________________________________________________________________________________________________</div>
					<div>_____________________________________________________________________________________________________________</div>
				</div>
			</div>
		</div>

		<div class="card my-5">
			<div class="card-header bg-secondary text-white fs-3 fw-bloder">Learning
				More About Yourself From Others</div>
			<div class="card-body">
				<div>It's useful to remember that your Humanality chart is based on
					your own self-ratings. How you see yourself may be different from
					how others see you. To learn more about yourself - a very
					courageous undertaking! - share this report with others (friends,
					family, and perhaps work associates) to get their feedback.
					Remember that everyone will have their own unique perception of
					you. Listen to what they say about you; ask for examples and
					stories and you'll learn how they have formed their viewpoints.</div>
				<div>Here's a good process to follow. First show others where your
					"big dot" plotted and review the general descriptions in earlier
					sections of this report. Then, ask if these match what they
					expected. Consider the reasons that people might have for seeing
					you differently than you see yourself. Perhaps they only know you
					in one setting. Maybe they are recalling a specific occasion when
					you behaved a certain way. Remember, it's not about being "right";
					the conversations you share and what you learn from these are
					what's important.</div>
				<h3>Instructions</h3>
				<div>Ask others how they see you. Then draw dots on the chart and
					label them with their names. Compare the variety of locations and
					how these reflect the different relationships with each person.
					Refer to the example below. Use the FEEDBACK WORKSHEET on the next
					page.</div>
				<img class="w-100" alt=""
					src="{{asset('assets/reports/temps/humanality/Background (40).png')}}">
				<h3 class="my-4">{{$template->FIRSTNAME_P}}'S FEEDBACK WORKSHEET</h3>
				<div class="text-center">(Personality Overall Rating Graph)</div>
				<div class="my-5">
					<div>Record additional feedback comments below:</div>
					<div>_____________________________________________________________________________________________________________</div>
					<div>_____________________________________________________________________________________________________________</div>
					<div>_____________________________________________________________________________________________________________</div>
					<div>_____________________________________________________________________________________________________________</div>
					<div>_____________________________________________________________________________________________________________</div>
					<div>_____________________________________________________________________________________________________________</div>
					<div>_____________________________________________________________________________________________________________</div>
					<div>_____________________________________________________________________________________________________________</div>
					<div>_____________________________________________________________________________________________________________</div>
				</div>
			</div>
		</div>

		<div class="card my-5">
			<div class="card-header bg-secondary text-white fs-3 fw-bloder">Summing
				Up</div>
			<div class="card-body">
				<div class="row my-5">
					<div class="w-75">{{$template->P_Summary}}</div>
					<div class="w-25">
						<img class="w-75" alt=""
							src="{{asset('assets/reports/temps/humanality/Background (26).png')}}">
						Summing up
					</div>
				</div>
				<div class="row my-5">{{$template->P_Cusp_Supplement}}</div>
			</div>
		</div>

		<div class="card my-5">
			<div class="card-header bg-secondary text-white fs-3 fw-bloder">Your
				Match Report</div>
			<div class="card-body">
				<div class="row my-5">
					<div class="w-75 text-danger">

						<div class="my-3">Now, get prepared for Section 3, the Match
							Report between you and your horse.</div>
						<div class="my-3">Finding the right balance with a horse is the
							secret of savvy. You need to learn how to flex your behavior
							according to the situation and to the horse's reactions, and to
							do it in an instant.</div>
						<div class="my-3">Bruce Lee once said, "Be like water my friend."
							Water becomes the shape of the vessel it is in; it is constantly
							adapting. That's what great horsemen do and that's why they can
							get along with any horse. They have mastered themselves and have
							nothing to prove.</div>
						<div class="my-3">In the Match Report, you'll start to understand
							what it takes to become your horse's dream partner.</div>
					</div>
					<div class="w-25">
						<img class="w-75" alt=""
							src="{{asset('assets/reports/imgs/Background (11).png')}}">
					</div>
				</div>

				<div class="row my-5">
					<div class="w-75">
						<h3 class="my-3 fw-bolder">Keeping your stress reactions in check
						</h3>
						<div class="my-3">Another important issue will be dealt with in
							the next section. Pat discusses your stress reactions around
							horses. Usually, these relate to your core Humanality, but stress
							and frustration can also bring out behaviors all over the chart.
						</div>
						<div class="my-3">You'll get a close-up look at how you scored on
							the stress reactions and help on how to consciously choose the
							appropriate replacement behaviors. Your horse is going to love
							you for this!</div>
					</div>
					<div class="w-25">
						<img class="w-75" alt=""
							src="{{asset('assets/reports/temps/match/Background (44).png')}}">
					</div>
				</div>


				<div class="row my-5">{{$template->P_Cusp_Supplement}}</div>

			</div>
		</div>
	</div>



	<div class="container-fluid my-5">
		<img alt="" class="w-100"
			src="{{asset('assets/reports/temps/match/Background (45).png')}}">
		<h1 class=text-center>For MERGEFIELD</h1>
		<h1 class="text-center">[Horse Name] ([{{$template->horse_name}}])</h1>
		<h6 class="card-subtitle mb-2 text-muted">Based on data provided by
			MERGEFIELD [Firstname-R] ([{{$template->Firstname_r}}]) MERGEFIELD
			[Lastname-R] ([{{$template->Lastname_r}}]) MERGEFIELD
			[Assessment-date] ([{{$template->assessment_date}}])</h6>
		<div class="card my-5">
			<div class="card-header bg-secondary text-white fs-3 fw-bloder">Your
				Horsenality/Humanality Match Report</div>
			<div class="card-body">
				<div class="row">
					<div class="w-50">
						<h3 class="my-3">Dear {{$template->FIRSTNAME_P}},</h3>
						<div class="my-3">Welcome to Section 3, your Parelli Match Report.
						</div>
						<div class="my-3">This is where things get really interesting,
							profoundly revealing, and practically helpful. Your Humanality
							profile is matched with {{$template->horse_name}}'s Horsenality and your
							similarities and differences are compared. You're going to
							explore the dynamics that play out between you and {{$template->horse_name}}.
						</div>
					</div>
					<div class="w-50 float-end">
						<img class="w-100 mw-75 min-w-25"
							src="{{asset('assets/reports/temps/match/Background (46).png')}}" />
					</div>
				</div>
				<div class="row my-5">
					<div class="my-3">As you know, your behavior can bring out
						different aspects of your horse's behavior. Horses may even be
						more sensitive and responsive to humans than we are to them.
						That's why it's so important for you to always be aware of how
						your innate Humanality is impacting your horse. One of the goals
						of our natural horsemanship program is to help you learn to flex
						your behavior so you become the leader {{$template->horse_name}} needs and
						bring out the best in {{($template->gender == 'male')?'him':'her'}}. However, you must start by
						learning how the basic match between the core you aligns with
						{{$template->horse_name}}'s core traits. This gives you a starting point to
						work from and reference point to build the right training program
						for {{$template->horse_name}} ...and for you!</div>
					<div class="my-3">That's why the richness of the online Horsenality
						System really comes out in this section; a comparison of your
						Humanality to {{$template->horse_name}}'s Horsenality. We're going to go along
						with you on this journey of discovery as your guides and help you
						identify ways to find new levels of harmony and build the dream
						relationship you've been wanting.</div>
					<div class="my-3">Prepare to get SAVVY about the match between your
						HUMANALITY and {{$template->horse_name}}'sHORSENALITY!</div>
					<div class="my-3">Naturally,</div>
					<div class="my-3">
						<img alt=""
							src="{{asset('assets/reports/temps/humanality/Background (28).png')}}">
					</div>
					<div>Pat Parelli</div>
				</div>
			</div>
		</div>

		<div class="card my-5">
			<div class="card-header bg-secondary text-white fs-3 fw-bloder">Report
				Contents</div>
			<div class="card-body">

				<p class="text-muted">PART 1</p>
				<p>The Match between You and {{$template->horse_name}}</p>

				<p class="text-muted">PART 2</p>
				<p>Interaction Patterns</p>

				<p class="text-muted">PART 3</p>
				<p>Snapshot of Tendencies</p>

				<p class="text-muted">PART 4</p>
				<p>Relationship Dynamics</p>

				<p class="text-muted">PART 5</p>
				<p>Challenges</p>

				<p class="text-muted">PART 6</p>
				<p>Partnership Strategies</p>

				<p class="text-muted">PART 7</p>
				<p>Advanced Partnership Strategies</p>

				<p class="text-muted">PART 8</p>
				<p>Situational Stress Behaviors</p>

				<p class="text-muted">PART 9</p>
				<p>Help with Situational Stress Behaviors</p>

				<p class="text-muted">PART 10</p>
				<p>Positive Aspects of Your Match</p>

				<p class="text-muted">PART 11</p>
				<p>Follow Up and Learn More</p>

				<p class="text-muted">PART 12</p>
				<p>Having Fun with Your Profile Charts</p>
			</div>
		</div>

		<div class="card my-5">
			<div class="card-header bg-secondary text-white fs-3 fw-bloder">The
				Match Between You and {{$template->horse_name}}</div>
			<div class="card-body">
				<div class="my-3">The chart on the left plots your Humanality score.
					The chart on the right is {{$template->horse_name}}'s Horsenality. We're going
					to compare and contrast these in this Match Report. Let's get
					going!</div>
				<div class="row my-5">
					<div class="w-50 text-center">
						<h3 class="my-3">{{$template->FIRSTNAME_P}}'S</h3>
						<h3 class="my-3">HUMANALITY</h3>
						<div class="my-3">(Personality Overall Rating Graph Small)</div>
					</div>
					<div class="w-50 text-center">
						<h3 class="my-3">{{$template->horse_name}}'S</h3>
						<h3 class="my-3">HORSENALITY</h3>
						<div class="my-3">(Horsenality Overall Rating Graph Small)</div>
					</div>
				</div>
				<div class="row my-5">
					<div class="w-75">
						<h3 class="my-3">Overview</h3>
						<div class="my-3">{{$template->M_Overview}}</div>
					</div>
					<div class="w-25">
						<img alt="" class="w-75"
							src="{{asset('assets/reports/imgs/Background (12).png')}}">
					</div>
				</div>
			</div>
		</div>

		<div class="card my-5">
			<div class="card-header bg-secondary text-white fs-3 fw-bloder">Interaction
				Patterns</div>
			<div class="card-body">
				<div class="my-3">Now it gets interesting. Let's take a look at the
					interaction patterns that will most likely emerge. In addition to
					your Humanality and Horsenality match, your interactions will also
					be impacted by both of your past experiences, level of training,
					age, and recent situations. For the purposes of this report, we're
					going to focus on your innate Humanality/Horsenality match.</div>
				<div class="row my-5">
					<div class="text-center">(Match Your Interaction Patterns Graph)</div>
				</div>
				<div class="row my-5">
					<div class="w-75">
						<div class="my-3">{{$template->M_Interaction}}</div>
					</div>
					<div class="w-25">
						<img alt="" class="w-75"
							src="{{asset('assets/reports/imgs/Background (7).png')}}">
					</div>
				</div>
				<div class="my-3"></div>
				<div class="my-3"></div>
				<div class="my-3"></div>
			</div>
		</div>

		<div class="card my-5">
			<div class="card-header bg-secondary text-white fs-3 fw-bloder">Snapshot
				of Tendencies</div>
			<div class="card-body">
				<h3 class="my-3">Similarities and differences between
					{{$template->FIRSTNAME_P}} and {{$template->horse_name}}:</h3>

				<div class="row my-5">
					<div class="w-50 text-center">
						<h3 class="my-3">HUMANALITY</h3>
						<div class="my-3">{{$template->P_Cartoon}}</div>
						<div class="my-3">{{$template->FIRSTNAME_P}}</div>
						<div class="my-3">{{$template->P_Quadrant}}</div>
					</div>
					<div class="w-50 text-center">
						<h3 class="my-3">HORSENALITY</h3>
						<div class="my-3">{{$template->H_Cartoon}}</div>
						<div class="my-3">{{$template->horse_name}}</div>
						<div class="my-3">{{$template->H_Quadrant}}</div>
					</div>
				</div>

				<div class="row my-5">{{$template->M_Table_Compare}}</div>
			</div>
		</div>

		<div class="card my-5">
			<div class="card-header bg-secondary text-white fs-3 fw-bloder">Relationship
				Dynamics</div>
			<div class="card-body">
				<h3 class="my-3">Here are some predictable relationship dynamics and
					challenges you'll have with {{$template->horse_name}}.</h3>

				<div class="row my-5">{{$template->M_Dynamics}}</div>
			</div>
		</div>

		<div class="card my-5">
			<div class="card-header bg-secondary text-white fs-3 fw-bloder">Challenges</div>
			<div class="card-body">
				<div class="row my-5">
					<div class="w-50">
						<div class="my-3 text-danger">Your horse can only be as calm or
							confident as you are. If you get emotionally out of balance, so
							does your horse. Fear, frustration and feeling like a failure are
							common emotions a human will feel around a horse... but that's only
							because they are still thinking and acting like a human... rather
							than as a leader for their horse.</div>
						<div class="my-3 text-danger">When in Horseville, do as horses do.
						</div>
					</div>
					<div class="w-50">

						<img class="w-100 mw-75 min-w-25"
							src="{{asset('assets/reports/temps/match/Background (47).png')}}" />
					</div>
				</div>
				<h3 class="my-3">Things that challenge you around {{$template->horse_name}}:</h3>

				<div class="row my-5">{{$template->M_Challenges}}</div>
			</div>
		</div>

		<div class="card my-5">
			<div class="card-header bg-secondary text-white fs-3 fw-bloder">Partnership
				Strategies</div>
			<div class="card-body">
				<div class="my-3">Strategies for Partnering with {{$template->horse_name}}</div>

				<div class="row my-5">
					<div class="w-50">
						<div class="my-3 text-muted">The best way to develop a strong and
							trusting relationship with a horse is on the ground. You can see
							his eye, read his body language, be more sensitive to his
							reactions - and you are safer because should anything go wrong,
							you are not sitting on top of him!</div>
					</div>
					<div class="w-50">
						<img class="w-100 mw-75 min-w-25"
							src="{{asset('assets/reports/temps/match/Background (48).png')}}" />
					</div>
				</div>
				<h3 class="my-3">Ground Strategies</h3>

				<div class="row my-5">{{$template->M_Ground}}</div>

				<h3 class="my-3">Riding Strategies</h3>

				<div class="row my-5">
					<div class="w-50">
						<div class="my-3 text-muted">Riding takes both you and
							{{$template->horse_name}} into a completely different dimension. You'll
							notice new behavior patterns in {{($template->gender == 'male')?'him':'her'}} and {{$template->horse_name}}
							will also read your balance, fluidity, touch, aids, and cues
							quite differently. Think of riding as an opportunity to build
							upon the relationship you established on the ground and a way to
							take it to new levels. However, realize that you must rebuild
							your communication step-by-step. Use the strategies below to make
							the most of your Humanality and Horsenality similarities and
							differences and bring out the best in your partner.</div>
					</div>
					<div class="w-50">
						<img class="w-100 mw-75 min-w-25"
							src="{{asset('assets/reports/temps/match/Background (49).png')}}" />
					</div>
				</div>
				<div class="row my-5">{{$template->M_Riding}}</div>
			</div>
		</div>



		<div class="card my-5">
			<div class="card-header bg-secondary text-white fs-3 fw-bloder">Advanced
				Partnership Strategies</div>
			<div class="card-body">
				<h3 class="my-3">Advanced Partnership Strategies with {{$template->horse_name}}</h3>

				<div class="row my-5">
					<div class="w-50">
						<div class="my-3 text-muted">As you and {{$template->horse_name}} advance in
							your partnership and stretch your performance level, you may
							inadvertently push {{$template->horse_name}} too hard and bring out some
							unwanted behaviors. The idea is to keep a good balance, not let
							your goals get ahead of your horsemanship principles.</div>
						<div class="my-3 text-muted">Put the relationship first, make
							progress positively but sensitively and you'll avoid frustration
							and keep your horse happy.</div>
					</div>
					<div class="w-50">
						<img class="w-100 mw-75 min-w-25"
							src="{{asset('assets/reports/temps/match/Background (50).png')}}" />
					</div>
				</div>

				<div class="row my-5">{{$template->M_Partnership}}</div>
			</div>
		</div>



		<div class="card my-5">
			<div class="card-header bg-secondary text-white fs-3 fw-bloder">Situational
				Stress Behaviors</div>
			<div class="card-body">
				<div class="my-3">Now let's look at some specific behaviors that you
					sometimes demonstrate around {{$template->horse_name}} particularly when you're
					stressed. Many of these will be found in your primary behavioral
					quadrant, but you may find some other unrelated stress behaviors in
					other quadrants. The locations of the small blue dots ( &#x2022; )
					indicate the intensity of each specific stress behavior and help
					you recognize how challenging the behaviors could be for both you
					and {{$template->horse_name}}.</div>
				<div class="mt-3 text-center">(Personality Detail Rating Graph)</div>

				<div class="row my-5">
					<div class="w-75">
						<div class="my-3 text-muted">One of my mentors, Ronnie Willis,
							said that a horse can cause you to experience every emotion known
							to man... and sometimes all in one session! That's because horses,
							as a species, know how to survive predators which often means
							resisting or over-reacting to you. Prey animals think differently
							than people, and your challenge is to find ways to moderate your
							behaviors related specifically to {{$template->horse_name}}'s needs and to
							bring out the best in {{($template->gender == 'male')?'him':'her'}}. In the next section, I will
							help you do just that.</div>
					</div>
					<div class="w-25">
						<img class="w-100 mw-75 min-w-25"
							src="{{asset('assets/reports/temps/match/Background (51).png')}}" />
					</div>
				</div>
			</div>
		</div>



		<div class="card my-5">
			<div class="card-header bg-secondary text-white fs-3 fw-bloder">Help
				with Situational Stress Behaviors</div>
			<div class="card-body">
				<div class="row my-5">
					<div class="w-75">
						<div class="my-3 text-muted">A major goal is to move your extreme
							behaviors toward the center of the chart, which means 'help them
							to become milder'! This not only makes your life more peaceful,
							but it also makes {{$template->horse_name}} less stressed and easier to teach
							and manage.</div>
						<div class="my-3 text-muted">Remember that, since your horse
							mirrors you, a stress-free you produces a stress-free, confident
							horse...and that's a happy horse!</div>
						<div class="my-3 text-muted">My comments and guidelines below will
							help you identify strategies for dealing with your own stress
							behaviors.</div>
					</div>
					<div class="w-25">
						<img class="w-100 mw-75 min-w-25"
							src="{{asset('assets/reports/imgs/Background (11).png')}}" />
					</div>
				</div>
				<div class="row my-5">Situational Stress behaviors:</div>

				<div class="row my-5">{{$template->P_Stress_Behaviors}}</div>
			</div>
		</div>



		<div class="card my-5">
			<div class="card-header bg-secondary text-white fs-3 fw-bloder">Positive
				Aspects of Your Match</div>
			<div class="card-body">
				<div class="rwo my-5">All human/horse matchups have their highlights
					and their challenges. As you learn how to create harmony, and to
					realize that this is YOUR job, you will be well on the way to
					developing a mutually rewarding and positive relationship with your
					horse.</div>
				<div class="rwo my-5">
					<div class="text-center">(Match Your Interaction Patterns Graph)</div>
				</div>
				<div class="row my-5">
					<div class="w-75">
						<div class="my-3 text-muted">Here's what you'll grow to appreciate
							in {{$template->horse_name}}</div>
						<div class="my-3">{{$template->M_Summary}}</div>
					</div>
					<div class="w-25">
						<img class="w-100 mw-75 min-w-25"
							src="{{asset('assets/reports/imgs/Background (19).png')}}" />
					</div>
				</div>
			</div>
		</div>



		<div class="card my-5">
			<div class="card-header bg-secondary text-white fs-3 fw-bloder">Follow
				Up and Learn More</div>
			<div class="card-body">
				<div class="row my-5">
					<div class="w-50">
						<div class="my-3 text-muted">I was once asked what personality is
							the best match for my horse? My response: "A horseman." Real
							horsemen naturally flex their Humanality in order to create
							rapport and respect and to achieve a deep bond with a horse. What
							they do naturally is what you will learn to do as you study and
							become more expert in reading horses, understanding their
							Horsenality and understanding yourself.</div>
						<div class="my-3 text-muted">I wish you every success in pursuing
							your dream with your horse in the most natural way possible and
							am proud that you have chosen Parelli Natural Horsemanship to be
							a part of your success strategy.</div>
						<div class="my-3 text-muted">Naturally,</div>
						<div class="my-3 text-muted">
							<img alt=""
								src="{{asset('assets/reports/temps/humanality/Background (28).png')}}">
						</div>
						<div class="text-muted">Pat Parelli</div>

					</div>
					<div class="w-50">
						<img class="w-100 mw-75 min-w-25"
							src="{{asset('assets/reports/temps/match/Background (52).png')}}" />
					</div>
				</div>
			</div>
		</div>



		<div class="card my-5">
			<div class="card-header bg-secondary text-white fs-3 fw-bloder">Having
				Fun with Your Profile Charts</div>
			<div class="card-body">
				<div class="row my-5">The following pages provide profile plaques
					you can hang on stalls or office doors, even cubicles, to remind
					yourself and others of your horse's Horsenality and your
					Humanality. Try laminating them, making posters, name tags and
					anything thing else you would find helpful. Have fun!</div>
				<div class="row my-5">
					<div class="w-75">
						<h3>{{$template->horse_name}}'s Name Plaque</h3>
						<div class="my-3 text-muted">Consider putting {{$template->horse_name}}'s
							profile chart on {{($template->gender == 'male')?'his':'her'}} stall door or feeding bin. This
							gives you a reminder of {{($template->gender == 'male')?'his':'her'}} primary Horsenality traits.
						</div>
						<div class="my-3 text-muted">A visible plaque also helps generate
							curiosity in others and pique their interest in learning the best
							strategies for training and playing with {{$template->horse_name}}.</div>
						<div class="my-3 text-muted">You might consider laminating it or
							even printing it on a foam board or more permanent material.</div>
					</div>
					<div class="w-25">
						<img class="w-100 mw-75 min-w-25"
							src="{{asset('assets/reports/temps/match/Background (53).png')}}" />
					</div>
				</div>
				<div class="row my-5">
					<div class="w-75">
						<h3>Your Name Plaque</h3>
						<div class="my-3 text-muted">You can also help others understand
							you by posting your Parelli Humanality profile in a visible
							place. Consider your bedroom door, home office, work cubicle,
							etc.</div>
						<div class="my-3 text-muted">This will grab the attention of
							others and encourage work associates, family, and friends to ask
							about it and discuss ways to communicate better with you. Keep
							your conversations positive and focused on strengths.</div>
					</div>
					<div class="w-25">
						<img class="w-100 mw-75 min-w-25"
							src="{{asset('assets/reports/temps/match/Background (55).png')}}" />
					</div>
				</div>
				<div class="row my-5">
					<div class="w-75">
						<h3>{{$template->FIRSTNAME_P}}'s Tent Card</h3>
						<div class="my-3 text-muted">Fold the tent card sheet so that it
							stands up on its own. You can place it on your desk, bathroom
							vanity, home work area, or any other place where others will see
							it. Get ready to tell others what it means, they'll be very
							interested!</div>
					</div>
					<div class="w-25">
						<img class="w-100 mw-75 min-w-25"
							src="{{asset('assets/reports/temps/match/Background (54).png')}}" />
					</div>
				</div>
			</div>
		</div>





		<div class="card my-5">
			<div class="card-body text-center">
				<div>MERGEFIELD [H-PLAQUE] {{$template->H_Plaque}}</div>
				<h3>MERGEFIELD</h3>
				<h3>{{$template->FIRSTNAME_P}}</h3>
				<h3>{{$template->FIRSTNAME_P}}'S</h3>
				<div>MERGEFIELD Personality Overall Rating Graph
					{{$template->P_Personality_graph}}</div>
			</div>
		</div>

		<div class="card my-5">
			<div class="card-body text-center">
				<div>MERGEFIELD [P-Tendencies]</div>
				<h3>{{$template->P_Tendencies}}</h3>
			</div>
		</div>

		<div class="card my-5">
			<div class="card-body text-center">
				<div>MERGEFIELD [P-Tentcard]</div>
				<h3>{{$template->P_Tentcard}}</h3>
			</div>
		</div>

		<div class="card my-5">
			<div class="card-body">
				<div class="row my-5">
					<div class="w-50">
						<h3>MERGEFIELD</h3>
						<h3>{{$template->FIRSTNAME_P}}</h3>
						<h3>{{$template->FIRSTNAME_P}}'S</h3>
						<div>HUMANALITY</div>
					</div>
					<div class="w-50">MERGEFIELD Personality Overall Rating Graph Small
						{{$template->P_Personality_graph_samll}}</div>
				</div>
			</div>
		</div>
		
	

	</div>




</body>