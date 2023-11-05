import random

def getResponse(ints, intents_json, context):
    list_of_intents = intents_json['intents']

    tag = ints[0]['intent']

    result = "You must ask the right questions 😕️"

    for i in list_of_intents:
        if i['tag'] == tag and (i.get('context', 'default') == context or not i.get('context')):
            result = random.choice(i['responses'])
            break

    return result, tag, context

# Test the function
ints = [{"intent": "noanswer"}]  # Simulate an intent that couldn't be determined
intents_json = {
    "intents": [
        {"tag": "greeting", "patterns": [], "responses": [], "context": [""]}
    ]
}
context = ""

response, tag, context = getResponse(ints, intents_json, context)
print(response)
